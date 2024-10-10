<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Models\Promocode;
use App\Models\Terminal;
use App\Models\Booking;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Illuminate\Support\Facades\Session;


class WebController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('web.index');
    }

    // customer login view

    public function showlogin(){
        return view('web.login');
    }

    // customer store login
    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('account')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('/'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // customer register view
    public function showregister(){
        return view('web.register');
    }

    // insert customer
    public function storeregister(StoreCustomerRequest $request){

        $validatedData = $request->all();
        $account = Customer::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone_no' => $validatedData['phone_no'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::guard('account')->login($account);
        return Redirect::route('showlogin');


        // return redirect()->route('customer.dashboard');

    }
    public function accountLogout(Request $request)
    {
         // Log out the user using the 'account' guard
         Auth::guard('account')->logout();  // <-- Correct way to access the guard

         // Invalidate the session
         $request->session()->invalidate();

         // Regenerate the session token to prevent session fixation attacks
         $request->session()->regenerateToken();

         // Redirect to the login page (or any other page you prefer)
         return redirect('/account/login')->with('success', 'You have been logged out.');

    }

    public function contactus(){
        return view('web.contact');
    }

    public function aboutus(){
        return view('web.aboutus');
    }

    public function howitworks(){
        return view('web.howitworks');
    }
    public function showbooking(){

        $allterminallists = Terminal::all();

        $fDate =  Session::get('fromDate');
        $fTime =  Session::get('fromTime');
        $tDate =  Session::get('tillDate');
        $tTime =  Session::get('tillTime');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promoCode');
        $airport =  Session::get('airport');

        return view('web.booking',compact('allterminallists','fDate','fTime','tDate','tTime','tPrice','pCode','airport'));
    }

    public function showcheckout(){

        $allterminallists = Terminal::all();

        $fDate =  Session::get('fromDate');
        $fTime =  Session::get('fromTime');
        $tDate =  Session::get('tillDate');
        $tTime =  Session::get('tillTime');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promocode');
        $airport =  Session::get('airport');

        $price =  Session::get('price');
        $discount =  Session::get('discount');
        $cusid =  Session::get('cusid');
        $cusfname =  Session::get('cusfirstname');
        $cuslname =  Session::get('cuslastname');
        $cusemail =  Session::get('cusemail');
        $cusphoneno =  Session::get('cusphoneno');
        $terminalid =  Session::get('terminalid');
        $terminalname =  Session::get('terminalname');

        return view('web.checkout',compact('allterminallists','terminalid','fDate','fTime','tDate','tTime','tPrice','pCode','price','discount','cusfname','cuslname','cusemail','cusphoneno','terminalname','cusid','airport'));

    }

    public function bookingdetailstep2(Request $request){

        $validatedData = $request->validate([
            'airport' => 'required|string',
            'parking_from_date' => 'required|date|date_format:Y-m-d',
            'parking_from_time' => 'required',
            'parking_till_date' => 'required|date|date_format:Y-m-d',
            'parking_till_time' => 'required',
            'promocode' => 'required|string',

        ]);

        $allterminallists = Terminal::all();

        $countfrom = Carbon::parse($request->input('parking_from_date'));
        $counttill = Carbon::parse($request->input('parking_till_date'));

        // Calculate the difference in days and include the last day (+1)
        $dayscount = $countfrom->diffInDays($counttill) + 1;

        // This will output the difference in days
        $price = 0;
        if ($dayscount >= 1) {
            $price += 55; // Base price for the 1st day
        }
        if ($dayscount >= 2 && $dayscount <= 5) {
            $price += ($dayscount - 1) * 2; // 2 pounds for each day from 2nd to 5th day
        } elseif ($dayscount >= 6 && $dayscount <= 14) {
            $price += (5 - 1) * 2; // 2 pounds for each day from 2nd to 5th day
            $price += ($dayscount - 5) * 5; // 5 pounds for each day from 6th to 14th day
        } elseif ($dayscount >= 15) {
            $price += (5 - 1) * 2; // 2 pounds for each day from 2nd to 5th day
            $price += (14 - 5) * 5; // 5 pounds for each day from 6th to 14th day
            $price += ($dayscount - 14) * 7; // 7 pounds for each day from 15th day onwards
        }

        $promocode = $request->input('promocode');

        // Initialize the total price to the original price
        $totalprice = $price;

        if (!empty($promocode)) {
            $promodetails = Promocode::getpromodetails($promocode);

            // Check if the promo code exists and has details
            if (!empty($promodetails) && !$promodetails->isEmpty()) {
                $discountamount = $promodetails[0]->discount_amount; // Get promo code discount
                $discounttype = $promodetails[0]->discount_type;     // Get promo code discount type

                // Calculate the discount based on the type
                if ($discounttype == "percent") {
                    $discountprice = $price / 100 * $discountamount;
                    $totalprice = $price - $discountprice;
                } else {
                    $discountprice = $discountamount;
                    $totalprice = $price - $discountprice;
                }
            }else{
                notify()->error('Failed to insert promocode.', 'Error', [
                    'position' => 'top-right' // Change this to your desired position
                ]);
            }
            // If promo details are empty, totalprice will remain unchanged (equal to $price)
        }
         // Retrieve query parameters
        //  $terminalId = $request->input('terminal_id');
         $fromDate = Carbon::parse($request->input('parking_from_date'))->format('Y-m-d');
         $fromTime = $request->input('parking_from_time');
         $tillDate = Carbon::parse($request->input('parking_till_date'))->format('Y-m-d');
         $tillTime = $request->input('parking_till_time');


         Session::put('fromDate', $fromDate);
         Session::put('fromTime', $fromTime);
         Session::put('tillDate', $tillDate);
         Session::put('tillTime', $tillTime);
         Session::put('totalPrice', $totalprice);
         Session::put('promoCode', $promocode);
         Session::put('airport', $request->input('airport'));


         return Redirect::route('showbooking');
        //  return view('web.booking',compact('fromDate','fromTime','tillDate','tillTime','promocode','allterminallists','totalprice'));
    }

    public function bookingdetailstep3(Request $request){

        //check if the user is authenticated unser the 'account' quard
        if(!Auth::guard('account')->check()){
            return  Redirect::route('showlogin');
        }
         // If authenticated, retrieve the authenticated user details
         $customer = Auth::guard('account')->user();
         $cuid = $customer->id;

         $cufirstname = $customer->first_name; // or $customer->fname depending on your model
         $culastname = $customer->last_name; // or $customer->lname depending on your model
         $cuemail = $customer->email; // or $customer->email depending on your model
         $cuphoneno = $customer->phone_no; // or $customer->phone_no depending on your model

        $countfrom = Carbon::parse($request->input('parking_from_date'));
        $counttill = Carbon::parse($request->input('parking_till_date'));

        // Calculate the difference in days and include the last day (+1)
        $dayscount = $countfrom->diffInDays($counttill) + 1;

         // This will output the difference in days
        $price = 0;
        if ($dayscount >= 1) {
            $price += 55; // Base price for the 1st day
        }
        if ($dayscount >= 2 && $dayscount <= 5) {
            $price += ($dayscount - 1) * 2; // 2 pounds for each day from 2nd to 5th day
        } elseif ($dayscount >= 6 && $dayscount <= 14) {
            $price += (5 - 1) * 2; // 2 pounds for each day from 2nd to 5th day
            $price += ($dayscount - 5) * 5; // 5 pounds for each day from 6th to 14th day
        } elseif ($dayscount >= 15) {
            $price += (5 - 1) * 2; // 2 pounds for each day from 2nd to 5th day
            $price += (14 - 5) * 5; // 5 pounds for each day from 6th to 14th day
            $price += ($dayscount - 14) * 7; // 7 pounds for each day from 15th day onwards
        }

        $promocode = $request->input('promocode');

        // Initialize the total price to the original price
        $totalprice = $price;


        if (!empty($promocode)) {
            $promodetails = Promocode::getpromodetails($promocode);

            // Check if the promo code exists and has details
            if (!empty($promodetails) && !$promodetails->isEmpty()) {
                $discountamount = $promodetails[0]->discount_amount; // Get promo code discount
                $discounttype = $promodetails[0]->discount_type;     // Get promo code discount type

                // Calculate the discount based on the type
                if ($discounttype == "percent") {
                    $discountprice = $price / 100 * $discountamount;
                    $totalprice = $price - $discountprice;
                } else {
                    $discountprice = $discountamount;
                    $totalprice = $price - $discountprice;
                }
            }else{
                notify()->error('Failed to insert promocode.', 'Error', [
                    'position' => 'top-right' // Change this to your desired position
                ]);
            }
            // If promo details are empty, totalprice will remain unchanged (equal to $price)
        }
        $terminaldetails = Terminal::getterminaldetails($request->input('selected_terminal_id'));//get terminal details


         $fromDate = Carbon::parse($request->input('parking_from_date'))->format('Y-m-d');
         $fromTime = $request->input('from_time');
         $tillDate = $tillDate = Carbon::parse($request->input('parking_till_date'))->format('Y-m-d');
         $tillTime = $request->input('till_time');

         Session::put('price', $price);
         Session::put('discount', $discountamount ?? 0);
         Session::put('cusid', $cuid);
         Session::put('cusfirstname', $cufirstname);
         Session::put('cuslastname', $culastname);
         Session::put('cusemail', $cuemail);
         Session::put('cusphoneno', $cuphoneno);
         Session::put('terminalid', $request->input('selected_terminal_id'));
         Session::put('terminalname', $terminaldetails[0]->name);
         Session::put('airport', $request->input('airport'));
         Session::put('promocode', $promocode);

         return Redirect::route('showcheckout');



    }
    public function completepage(){
        return view('web.completed');
    }

}
