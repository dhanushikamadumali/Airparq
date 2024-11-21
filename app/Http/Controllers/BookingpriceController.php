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
    public function store(StoreBookingpriceRequest $request)
    {
        try{

            if($request->datecount>31){
                notify()->error('Can not insert this day count', 'Error', [
                    'position' => 'top-right' // Change this to your desired position
                ]);
                return back();

            }
            Bookingprice::create($request->all());

            notify()->success('Successfully insert booking price!','Success!',[
                'position' => 'bottom-right'
            ]);
        }catch(Exception $e){
            notify()->error('Failed to insert booking price', 'Error', [
                'position' => 'top-right' // Change this to your desired position
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
    public function edit(Bookingprice $bookingprice,$id)
    {
        $bookingprice = $bookingprice::Find(Crypt::decryptString($id));
        return view('bookingprice.edit',compact('bookingprice'));
    }

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
}


