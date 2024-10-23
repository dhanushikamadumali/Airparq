<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;
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

class BookingController extends Controller
{
    public function __construct(){
        $this->middleware(CompanySettings::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allbookinglists = Booking::getCustomerByBookingId();
        return view('booking.index',compact('allbookinglists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $bookingCode = 'BOOK' . str_pad($nextId, 5, '0', STR_PAD_LEFT); // 'BOOK00001'
        try{
            $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));
            $redirectUrl = route('completepage') . '?session_id={CHECKOUT_SESSION_ID}';
            $roundno = round($request->input('price'),2);
            $totalAmount =   $roundno * 100;

            $response =  $stripe->checkout->sessions->create([
                'success_url' => $redirectUrl,
                'line_items' => [
                    [
                        'price_data'  => [
                            'product_data' => [
                                'name' => 'airparq booking',
                            ],
                            'unit_amount'  => $totalAmount,
                            'currency'     => 'GBP',
                        ],
                        'quantity'    => 1,
                    ],
                ],
                'mode' => 'payment',
                'allow_promotion_codes' => false
            ]);
            $validateddata = $request->all();//all validated data
            $validateddata['booking_code'] = $bookingCode;
            $validateddata['totalAmount'] = $roundno;
            $validateddata['flight_arrival_date'] = $flight_arrival_date;
            $validateddata['flight_departure_date'] = $flight_departure_date;
            Booking::create($validateddata);
            Notification::route('mail', 'dhanushika76@gmail.com')->notify(new Confirmationemail($validateddata));
            notify()->success('Booking Successfully!','Success!',[
                'position' => 'bottom-right'
            ]);
            return redirect($response['url']);
        }catch(Exception $e){
            notify()->error('Failed to Booking.', 'Error', [
                'position' => 'top-right' // Change this to your desired position
            ]);

        }

    }

    // public function stripeCheckoutSuccess(Request $request)
    // {
    //     $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

    //     $session = $stripe->checkout->sessions->retrieve($request->session_id);
    //     info($session);

    //     $successMessage = "We have received your payment request and will let you know shortly.";

    //     return view('web.completed', compact('successMessage'));
    // }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
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
            if ($deletebooking->status === 0) { // Assuming 1 means "active" or similar
                return response()->json([
                    'success' => false,
                    'message' => 'Booking cannot be deleted as it is already marked as deleted'
                ], 400);
            } else {
                // Update the status to mark it as deleted or inactive
                $booking::updatestatus($deletebooking->id);
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
                <a href="">
                    <i class="fa fa-edit editbtn"></i>
                </a>
                <button class="delete" onclick="">
                    <i class="fa fa-times deletebtn"></i>
                </button>
            ';

            return [
                $booking->booking_code,
                $booking->first_name." ". $booking->last_name,
                $booking->email,
                $booking->phone_no,
                $buttons // Add the buttons HTML here
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
            // Create HTML for action buttons
            $buttons = '
                <a href="">
                    <i class="fa fa-edit editbtn"></i>
                </a>
                <button class="delete" onclick="">
                    <i class="fa fa-times deletebtn"></i>
                </button>
            ';

            return [
                $booking->booking_code,
                $booking->first_name." ". $booking->last_name,
                $booking->email,
                $booking->phone_no,
                $booking->parking_from_time,
                $buttons // Add the buttons HTML here
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
            // Create HTML for action buttons
            $buttons = '
                <a href="">
                    <i class="fa fa-edit editbtn"></i>
                </a>
                <button class="delete" onclick="">
                    <i class="fa fa-times deletebtn"></i>
                </button>
            ';

            return [
                $booking->booking_code,
                $booking->first_name." ". $booking->last_name,
                $booking->email,
                $booking->phone_no,
                $booking->parking_till_time,
                $buttons // Add the buttons HTML here
            ];
        });

        // Return as JSON
        return response()->json(['data' => $data]);
    }

    public function printbooking(Booking $booking,$id){
        $id = Crypt::decryptString($id);
        $bookingdetails = Booking::bookingdetailsbyid($id);
        return view('booking.print',compact('bookingdetails'));
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




}
