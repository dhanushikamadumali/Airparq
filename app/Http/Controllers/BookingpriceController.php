<?php

namespace App\Http\Controllers;

use App\Models\Bookingprice;
use App\Http\Requests\StoreBookingpriceRequest;
use App\Http\Requests\UpdateBookingpriceRequest;
use FFI\Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use App\Models\Setting;
use App\Http\Middleware\CompanySettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SendEmail;



class BookingpriceController extends Controller
{
    public function __construct(){
        $this->middleware(CompanySettings::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookingpricelists = Bookingprice::getAllPromoDetails($request)->paginate(5);
        return view('bookingprice.index',compact('bookingpricelists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bookingprice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the file input
            $validator = Validator::make($request->all(), [
                'csv_file' => 'required|mimes:csv,txt|max:2048',
            ]);

            if ($validator->fails()) {
                notify()->error('Invalid file format', 'Error', [
                    'position' => 'top-right'
                ]);
                return Redirect::route('allbookingprice');
            }

            // Open the file and read its contents
            if ($file = $request->file('csv_file')) {
                // Delete all previous data in the table
                Bookingprice::truncate(); // Clears the entire table

                $path = $file->getRealPath();
                $data = array_map('str_getcsv', file($path)); // Convert CSV rows to an array

                // Process the data
                foreach ($data as $key => $row) {
                    if ($key === 0) {
                        // Skip the header row
                        continue;
                    }

                    // Insert data into the database
                    Bookingprice::create([
                        'datecount' => $row[0], // Map to your database columns
                        'booking_price' => $row[1],
                        // Add more columns as needed
                    ]);
                }

                notify()->success('Successfully inserted booking prices!', 'Success!', [
                    'position' => 'bottom-right'
                ]);
            }
        } catch (Exception $e) {
            notify()->error('Failed to insert booking prices. Error: ' . $e->getMessage(), 'Error', [
                'position' => 'top-right'
            ]);
        }

        return Redirect::route('allbookingprice');

    }

    /**
     * Display the specified resource.
     */
    public function show(Bookingprice $bookingprice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit()
    // {
    //     $pricelists = Bookingprice::all();
    //     $data = [
    //         'bookingprices' => $pricelists,
    //     ];
    //     $pdf = PDF::loadView('bookingprice.allbookingpricepdf', $data);
    //     return $pdf->download('allbookingpricelists.pdf');
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingpriceRequest $request, Bookingprice $bookingprice)
    {
        try{
            $bookingprice = $bookingprice::findOrFail($request->id);
            $bookingprice->update($request->all());
            notify()->success('Sucessfully Updated bookingprice!');
        }catch(Exception $e){
            notify()->error('Failed to Update bookingprice');
        }
        return Redirect::route('allbookingprice');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookingprice $bookingprice,$id)
    {
        try{
            $deletebookingprice = $bookingprice::FindOrFail(Crypt::decryptString($id));
            $deletebookingprice->delete();
            return response()->json([
                'success' =>true,
                'message' =>'bookingprice deleted succssfully'
            ]);

        }catch(Exception $e){
            return response()->json([
                'success' =>false,
                'message' =>'failed bookingprice deleted succssfully'
            ],500);

        }
    }

    public function send(Request $request)
    {
        // try{
        //     Notification::route('mail', $request->input('email'))->notify(new sendmail());
        //     notify()->success('Sucessfully Updated bookingprice!');
        // }catch(Exception $e){
        //     notify()->error('Failed to Update bookingprice');
        // }
        // return Redirect::route('allbookingprice');
        try{
            SendEmail::create($request->all());
            notify()->success('Successfully insert','Success!',[
                'position' => 'bottom-right'
            ]);
        }catch(Exception $e){
            notify()->error('Failed to insert.', 'Error', [
                'position' => 'top-right' // Change this to your desired position
            ]);
        }
        return back();
    }

}


