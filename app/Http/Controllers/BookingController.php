<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Terminal;
use Carbon\Carbon;


class BookingController extends Controller
{
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
        //
    }

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
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
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
         // Get the row ID from the request
         $rowId = $request->input('row_id');

         // Get the array of photos from the request
        //  $photos = $request->input('photos');
         $photos = json_decode($request->input('photos'));

         $imagePaths = [];
         foreach ($photos as $index => $base64Image) {
            dd($photos);
            // $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

            // $fileName = 'photo_' . $rowId . '_' . time() . "_{$index}.jpg";

            // \Storage::put("public/photos/{$fileName}", $imageData);

            // YourModel::create([
            //     'row_id' => $rowId,
            //     'photo_path' => "storage/photos/{$fileName}",
            // ]);
        }

        return response()->json(['success' => 'Photos uploaded successfully']);
         // Check if photos are present
        //  if (!empty($photos)) {
        //      foreach ($photos as $photoData) {
        //          // Create unique name for the image
        //          $imageName = time() . rand(100, 999) . '.jpeg';
        //          // Decode the base64 image data
        //          $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photoData));
        //          // Save the decoded image as a file
        //          $filePath = public_path('assets/vehicleimage/')  . $imageName;
        //          file_put_contents($filePath, $decodedImage);

        //          // Update the booking record with the new image path
        //          $imagePaths  = $imageName;  // Assuming 'image' is the column for storing the image filename
        //         //  $booking->save();  // Save the booking record with the updated image



        //      }

        //  }

        //  $booking = $booking::findOrFail($rowId);
        //  $booking->image = json_encode($imagePaths);  // Save JSON-encoded array
         Booking::where('id',($rowId))->update(['image'=>json_encode($imagePaths) ]);
        //  $booking->save();

         return response()->json(['success' => 'Photos uploaded successfully']);
    }



}
