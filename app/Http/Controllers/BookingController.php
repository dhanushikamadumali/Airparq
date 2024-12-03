<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;
use App\Http\Requests\BookingSearchRequest;
use Illuminate\Support\Facades\Crypt;
use App\Models\Terminal;
use Carbon\Carbon;
use Exception;
use App\Models\Promocode;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Confirmationemail;
use App\Http\Middleware\CompanySettings;
use App\Notifications\Cancleemail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Mail;
use App\Mail\CancleBookingEmail;
use App\Models\Customer;

class BookingController extends Controller
{
    public function __construct(){
        $this->middleware(CompanySettings::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search') || $request->has('status')) {
            // Check if status is set
            if ($request->has('status')) {
                // Validate the status to ensure it's either 0 or 1
                $status = in_array($request->status, [0, 1]) ? $request->status : null;
            }
            $allbookinglists = Booking::with('customer:id,first_name,email,phone_no')
                ->when($request->search, function ($query) use ($request) {
                    $query->where(function ($query) use ($request) {
                        $query->where('booking_code', 'LIKE', '%' . $request->search . '%')
                              ->orWhereHas('customer', function ($query) use ($request) {
                                  $query->where('first_name', 'LIKE', '%' . $request->search . '%');
                              });
                    });
                })
                ->when(isset($status), function ($query) use ($status) {
                    $query->where('status', $status); // Filter by status if provided
                })
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        } else {
            // Default: Show all bookings if no filters are applied
            $allbookinglists = Booking::with('customer:id,first_name,email,phone_no')
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        }
        return view('booking.index', compact('allbookinglists'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $flight_arrival_date = Carbon::parse($request->input('flight_arrival_date'));
        $flight_departure_date = Carbon::parse($request->input('flight_departure_date'));
        $latestBooking = Booking::orderBy('id', 'desc')->first();
        $nextId = $latestBooking ? $latestBooking->id + 1 : 1;
        $bookingCode = 'B' . str_pad($nextId, 5, '0', STR_PAD_LEFT); // 'BOOK00001'
        try{
            $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));
            $roundno = round($request->input('price'), 2);
            $totalAmount = $roundno * 100;
            $redirectUrl = route('success'); // Handle success here
            $failedUrl = route('failed');
            $response = $stripe->checkout->sessions->create([
                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' => 'AirParq Booking',
                            ],
                            'unit_amount' => $totalAmount,
                            'currency' => 'GBP',
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => $redirectUrl . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $failedUrl,
            ]);
             // Store temporary booking details in the session
             session([
                'booking_data' => [
                    'booking_code' => $bookingCode,
                    'price' => $roundno,
                    'flight_arrival_date' => $flight_arrival_date,
                    'flight_departure_date' => $flight_departure_date,
                    'validated_data' => $request->all(),
                ]
            ]);

            return redirect($response['url']);

        }catch(Exception $e){
            notify()->error('Failed to Booking.', 'Error', [
                'position' => 'top-right'
            ]);
            return redirect()->back();
        }

    }

    public function handlePaymentSuccess(Request $request)
    {
        $session_id = $request->input('session_id');
        $bookingData = session('booking_data');

        if (!$bookingData || !$session_id) {
            notify()->error('Invalid payment session.', 'Error');
            return redirect()->route('showcheckout'); // Adjust to your desired route
        }
        try {
            $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));
            $session = $stripe->checkout->sessions->retrieve($session_id);

            if ($session->payment_status === 'paid') {

                // Insert booking details into the database
                $validatedData = $bookingData['validated_data'];

                $validatedData['booking_code'] = $bookingData['booking_code'];
                $validatedData['price'] = $bookingData['price'];
                $validatedData['flight_arrival_date'] = $bookingData['flight_arrival_date'];
                $validatedData['flight_departure_date'] = $bookingData['flight_departure_date'];

                Booking::create($validatedData);
                // Send confirmation email
                $customer = Customer::FindOrFail($validatedData['customer_id']);
                $users = [
                    $validatedData['email'],// Customer's email (assuming you store it in the booking model)
                    "admin@airparq.com"// Admin's email (set in the .env file)
                ];
                Notification::route('mail', $users)->notify(new Confirmationemail($validatedData));

                notify()->success('Payment successful! Booking confirmed.', 'Success');
                return redirect()->route('completepage'); // Adjust to your success page route
            } else {
                notify()->error('Payment not completed.', 'Error');
                return redirect()->route('showcheckout'); // Adjust to your desired route
            }
        } catch (Exception $e) {
            Log::error('Booking creation failed: ' . $e->getMessage());
            notify()->error('An error occurred while verifying payment.', 'Error');
            return redirect()->route('showcheckout'); // Adjust to your desired route
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Booking $booking,$id)
    {
        $booking = $booking::showbookingdetailsbyid(Crypt::decryptString($id));
        if (isset($booking[0]->image) && !empty($booking[0]->image)) {
            $images = json_decode($booking[0]->image, true);
        } else {
            $images = [];
        }
        $allterminallists = Terminal::all();
        return view('booking.view', compact('booking','allterminallists','images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking,$id)
    {
        $booking = $booking::editbookingdetailsbyid(Crypt::decryptString($id));
        if (isset($booking[0]->image) && !empty($booking[0]->image)) {
            $images = json_decode($booking[0]->image, true);
        } else {
            $images = [];
        }
        $allterminallists = Terminal::all();
        return view('booking.edit', compact('booking','allterminallists','images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        try{
            $data = $request->all();
            $booking = $booking::findOrFail($request->id);
            $booking->update($data);
            notify()->success('Sucessfully Updated booking!');
        }catch(Exception $e){
            notify()->error('Failed to Update booking');
        }
        return Redirect::route('allbooking');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking,$id)
    {
        try{
            $deletebooking = $booking::FindOrFail(Crypt::decryptString($id));
            // Check if the booking is in a state that allows for deletion
            if ($deletebooking) { // Assuming 1 means "active" or similar
                // Delete to mark it as deleted or inactive
                $deletebooking->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Booking deleted successfully'
                ]);
            }
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ], 404);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete booking'
            ], 500);
        }
    }
     /**
     * status filter .
     */
    public function statusfilter(Booking $booking)
    {
        return view('booking.statusfiltebooking');
    }
     /**
     * get fileter date booking details .
     */
    public function  getfilterbookingstatus(Request $request, Booking $booking)
    {
        $status = $request->input('status');
        $filterdata =Booking::getfilterstatusetails($status);
        // Transform data into the format required by DataTables
        $data =  $filterdata->map(function($booking) {
            // Encrypt ID for the action URLs
            $encryptedId = Crypt::encryptString($booking->id);
            return [
                $booking->booking_code,
                $booking->first_name." ". $booking->last_name,
                $booking->email,
                $booking->phone_no,
            ];
        });
        // Return as JSON
        return response()->json(['data' => $data]);
    }
     /**
     * date filter .
     */
    public function datefilter(Booking $booking)
    {
        return view('booking.datefilterbooking');
    }
     /**
     * get fileter date booking details .
     */
    public function  getfilterbookingdate(Request $request, Booking $booking)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $filterdata =Booking::getfilterdatedetails($from_date,$to_date);
        // Transform data into the format required by DataTables
        $data =  $filterdata->map(function($booking) {
            // Encrypt ID for the action URLs
            $encryptedId = Crypt::encryptString($booking->id);
            // Create HTML for action buttons
            $buttons = '
             <a href="' . route('editbooking', Crypt::encryptString($booking->id)) . '">
                <i class="fa fa-edit editbtn"></i>
            </a>
            <a href="' . route('printbooking1', $booking->id) . '">
                <i class="fas fa-print print"></i>
            </a>
            <a href="' . route('viewbooking', Crypt::encryptString($booking->id)) . '">
                <i class="far fa-eye viewbtn"></i>
            </a>
            <button class="btn p-0 cancle" onclick="bookingdetailscancle(\'' . Crypt::encryptString($booking->id) . '\')">
                <i class="fas fa-ban canclebtn"></i>
            </button>
            <button class="btn p-0 delete" onclick="bookingdetailsdelete(\'' . Crypt::encryptString($booking->id) . '\')">
                <i class="fa fa-times deletebtn"></i>
            </button>
              <button
                type="button"
                class="btn p-0"
                data-bs-toggle="modal"
                data-bs-target="#zoomImageModal"
                 data-url="' . route('zoomimage', Crypt::encryptString($booking->id)) . '">
                <i class="fa-solid fa-image" style="color:#660066"></i>
            </button>
            ';
            $statusBadge = '';
            if ($booking->status == 0) {
                $statusBadge = '<span class="badge badge-danger">Cancel</span>';
            } elseif ($booking->status == 1) {
                $statusBadge = '<span class="badge badge-success">Success</span>';
            }
            return [
                $booking->booking_code,
                $booking->first_name,
                $booking->email,
                $booking->phone_no,
                $statusBadge,
                $buttons

            ];
        });

        // Return as JSON
        return response()->json(['data' => $data]);
    }
     /**
     * income booking.
     */
    public function incomebook(Terminal $terminal)
    {
        $terminallist = Terminal::all();
        return view('booking.incomingbooking',compact('terminallist'));
    }

     /**
     * get fileter income booking details .
     */
    public function  getfilterincomebooking(Request $request, Booking $booking)
    {
        // Get today's date
        $today = Carbon::today()->toDateString(); // Returns in 'Y-m-d' format
        $terminal = $request->input('terminal');
        $filterdata =Booking::getfilterincomebooking($today,$terminal);
        // Transform data into the format required by DataTables
        $data =  $filterdata->map(function($booking) {
            // Encrypt ID for the action URLs
            $encryptedId = Crypt::encryptString($booking->id);

            return [
                $booking->booking_code,
                $booking->first_name." ". $booking->last_name,
                $booking->email,
                $booking->phone_no,
                $booking->parking_from_time,
            ];
        });

        // Return as JSON
        return response()->json(['data' => $data]);
    }

     /**
     * outcome booking .
     */
    public function outgoingbooking(Terminal $terminal)
    {
        $terminallist = Terminal::all();
        return view('booking.outgoingbooking',compact('terminallist'));
    }

      /**
     * get fileter outgoing booking details .
     */
    public function  getfilteroutgoingbooking(Request $request, Booking $booking)
    {
        // Get today's date
        $today = Carbon::today()->toDateString(); // Returns in 'Y-m-d' format
        $terminal = $request->input('terminal');
        $filterdata =Booking::getfilteroutgoingbooking($today,$terminal);
        // Transform data into the format required by DataTables
        $data =  $filterdata->map(function($booking) {
            // Encrypt ID for the action URLs
            $encryptedId = Crypt::encryptString($booking->id);
            return [
                $booking->booking_code,
                $booking->first_name." ". $booking->last_name,
                $booking->email,
                $booking->phone_no,
                $booking->parking_till_time,
            ];
        });

        // Return as JSON
        return response()->json(['data' => $data]);
    }

    public function printbooking(Booking $booking,$id){

        $bookingdetails = Booking::bookingdetailsbyid($id);
        return view('booking.print',compact('bookingdetails'));
    }
    public function printbooking1(Booking $booking,$id){

        $bookingdetails = Booking::bookingdetailsbyid($id);
        return view('booking.pdf',compact('bookingdetails'));
    }


    public function uploadvehiclephoto(Request $request,Booking $booking){
         try{
            // Get the row ID from the request
            $rowId = $request->input('row_id');
            $photos = json_decode($request->input('photos'));
            $imagePaths = [];
            foreach ($photos as $index => $base64Image) {

               $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
               $fileName = $rowId . '_' . time() . "_{$index}.jpg";
               $filePath = public_path('assets/vehicleimage/')  .$fileName;
               file_put_contents($filePath,  $imageData);
               $imagePaths[] = "{$fileName}";

           }
            Booking::where('id',($rowId))->update(['image'=>json_encode($imagePaths) ]);
            notify()->success('Photos uploaded successfully','Upload Success', [
               'position' => 'bottom-right',
               'closeButton' => true,
           ]);
            return response()->json(['success' => 'true']);

         }catch(Exception $e){
            notify()->error('Failed to Upload photos.', 'Error', [
                'position' => 'top-right' // Change this to your desired position
            ]);

         }
    }


    public function cancle(Booking $booking,$id)
    {
        try{
            $canclebooking = $booking::FindOrFail(Crypt::decryptString($id));

            // Check if the booking is in a state that allows for deletion
            if ($canclebooking->status === 0) { // Assuming 1 means "active" or similar
                return response()->json([
                    'success' => false,
                    'message' => 'Booking cannot be deleted as it is already marked as cancle'
                ], 400);
            } else {
                // Update the status to mark it as deleted or inactive
                //
                // Mail::to('dhanushik76@gmail.com')->send(new CancleBookingEmail('hbjh'));
                $booking::updatestatus($canclebooking->id);
                $customer = Customer::FindOrFail($canclebooking->customer_id);
                $users = [
                    $customer->email, // Customer's email (assuming you store it in the booking model)
                    "admin@airparq.com"// Admin's email (set in the .env file)
                ];
                Notification::route('mail', $users)->notify(new Cancleemail($canclebooking));
                return response()->json([
                    'success' => true,
                    'message' => 'Booking Cancle Successfully'
                ]);
            }
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ], 404);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete booking'
            ], 500);
        }
    }




    public function zoomimage(Booking $booking,$id)
    {
        $booking = $booking::editbookingdetailsbyid(Crypt::decryptString($id));
        if (isset($booking[0]->image) && !empty($booking[0]->image)) {
            $images = json_decode($booking[0]->image, true);
            $firstImage = $images[0] ?? null; // Get the first image or null if none exist

        } else {
            $images = [];
            $firstImage = null;
        }
        return response()->json([
            'images' => $images,
            'firstImage' => $firstImage,
        ]);
    }
}
