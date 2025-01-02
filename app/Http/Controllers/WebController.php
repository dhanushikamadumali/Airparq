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
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use App\Models\AcoountPasswordResetToken;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use App\Models\Bookingprice;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\CompanySettings;
use App\Http\Middleware\AllPromoCode;

class WebController extends Controller
{
    public function __construct(){
        $this->middleware(CompanySettings::class);
        $this->middleware(AllPromoCode::class);
    }
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fDate =  Session::get('fromDate');
        $fHour =  Session::get('fromHour');
        $fMin =  Session::get('fromMin');
        $tDate =  Session::get('tillDate');
        $tHour =  Session::get('tillHour');
        $tMin =  Session::get('tillMin');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promoCode');
        $airport =  Session::get('airport');
        return view('web.index',compact('fDate','fHour','fMin','tDate','tHour','tMin','tPrice','pCode','airport'));
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
            // return property_exists($this, 'redirectTo') ? $this->redirectTo : session('pre-url');
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
    //show contact us page
    public function contactus(){

        return view('web.contact');
    }
    // show about us
    public function aboutus(){

        return view('web.aboutus');
    }
    //show howitworks
    public function howitworks(){

        return view('web.howitworks');
    }
    //show bookindpage
    public function showbooking(){

        $allterminallists = Terminal::all();
        $fDate =  Session::get('fromDate');
        $fHour =  Session::get('fromHour');
        $fMin =  Session::get('fromMin');
        $tDate =  Session::get('tillDate');
        $tHour =  Session::get('tillHour');
        $tMin =  Session::get('tillMin');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promoCode');
        $airport =  Session::get('airport');
        return view('web.booking',compact('allterminallists','fDate','fHour','fMin','tDate','tHour','tMin','tPrice','pCode','airport'));
    }
    //show bookingone page
    public function showbookingone(){

        $fDate =  Session::get('fromDate');
        $fHour =  Session::get('fromHour');
        $fMin =  Session::get('fromMin');
        $tDate =  Session::get('tillDate');
        $tHour =  Session::get('tillHour');
        $tMin =  Session::get('tillMin');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promoCode');
        $airport =  Session::get('airport');
        return view('web.bookingone',compact('fDate','fHour','fMin','tDate','tHour','tMin','tPrice','pCode','airport'));
    }
    // show checkout page
    public function showcheckout(){

        $allterminallists = Terminal::all();
        $fDate =  Session::get('fromDate');
        $fHour =  Session::get('fromHour');
        $fMin =  Session::get('fromMin');
        $tDate =  Session::get('tillDate');
        $tHour =  Session::get('tillHour');
        $tMin =  Session::get('tillMin');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promocode');
        $airport =  Session::get('airport');

        $price =  Session::get('price');
        $discount =  Session::get('discount');
        $terminalid =  Session::get('terminalid');
        $terminalname =  Session::get('terminalname');
         // Initialize variables
         $cusid = null;
         $cusfname = null;
         $cuslname = null;
         $cusemail = null;
         $cusphoneno = null;

         // Check if the customer is logged in
         if (Auth::guard('account')->check()) {
             $customer = Auth::guard('account')->user();
             $cusid = $customer->id;
             $cusfname = $customer->first_name;
             $cuslname = $customer->last_name;
             $cusemail = $customer->email;
             $cusphoneno = $customer->phone_no;

             // Store in session
             Session::put('cusid', $cusid);
             Session::put('cusfirstname', $cusfname);
             Session::put('cuslastname', $cuslname);
             Session::put('cusemail', $cusemail);
             Session::put('cusphoneno', $cusphoneno);
         } elseif (Session::has('cusid')) {
             // Retrieve existing session data
             $cusid = Session::get('cusid');
             $cusfname = Session::get('cusfirstname');
             $cuslname = Session::get('cuslastname');
             $cusemail = Session::get('cusemail');
             $cusphoneno = Session::get('cusphoneno');
         }
        return view('web.checkout',compact('allterminallists','terminalid','fDate','fHour','fMin','tDate','tHour','tMin','tPrice','pCode','price','discount','cusfname','cuslname','cusemail','cusphoneno','terminalname','cusid','airport'));
    }

    public function bookingdetailstep2(Request $request)
    {

        $validatedData = $request->validate([
            'airport' => 'required|string',
            'parking_from_date' => 'required|date',
            'parking_till_date' => 'required|date',
            'parking_from_hour' => 'required',
            'parking_from_min'=> 'required',
            'parking_till_hour'=> 'required',
            'parking_till_min'=>'required',
            'promocode' => 'nullable|string',
        ]);

        $allterminallists = Terminal::all();
        // Parse the dates using Carbon
        $fromDate = Carbon::parse($request->input('parking_from_date'));
        $tillDate = Carbon::parse($request->input('parking_till_date'));
        // Calculate the difference in days and include the last day (+1)
        $dayscount = $fromDate->diffInDays($tillDate);
        if ($dayscount > 32) {
            session()->flash('error', 'Parking dates must be within 31 days');
            return back(); // Stop further processing
        }
        $bookingprice = Bookingprice::getbookingcount($dayscount);
        // Check if the booking price is null or empty
        if (empty($bookingprice) || $bookingprice->isEmpty()) {
            session()->flash('error', 'No price found for the selected days. Please check your input.');
            return back(); // Redirect back with an error message
        }
        $price = $bookingprice[0]->booking_price;
        $promocode = $request->input('promocode');
        $totalprice = $price;
        if (!empty($promocode)) {
            $promodetails = Promocode::getpromodetails($promocode);
            if (!empty($promodetails) && !$promodetails->isEmpty()) {
                $discountamount = $promodetails[0]->discount_amount; // Get promo code discount
                $discounttype = $promodetails[0]->discount_type;     // Get promo code discount type
                if ($discounttype == "percent") {
                    $discountprice = $price / 100 * $discountamount;
                    $totalprice = $price - $discountprice;
                } else {
                    $discountprice = $discountamount;
                    $totalprice = $price - $discountprice;
                }
            } else {
                $totalprice = $price;
            }
        } else {
            $totalprice = $price;
        }
        // Store session values
        $fromDate = Carbon::parse($request->input('parking_from_date'))->format('Y-m-d');
        $fromHour = $request->input('parking_from_hour');
        $fromMin = $request->input('parking_from_min');
        $tillDate = Carbon::parse($request->input('parking_till_date'))->format('Y-m-d');
        $tillHour = $request->input('parking_till_hour');
        $tillMin = $request->input('parking_till_min');

        session()->put('fromDate', $fromDate);
        session()->put('fromHour', $fromHour);
        session()->put('fromMin', $fromMin);
        session()->put('tillDate', $tillDate);
        session()->put('tillHour', $tillHour);
        session()->put('tillMin', $tillMin);
        session()->put('totalPrice', $totalprice);
        session()->put('promoCode', $promocode);
        session()->put('airport', $request->input('airport'));
        return Redirect::route('showbooking');
    }


    public function bookingdetailstep3(Request $request){
        // Check if selected_terminal_id is provided
        if (!$request->input('selected_terminal_id')) {
            notify()->error('Terminal ID is required!', 'Missing Data', [
                'position' => 'top-right',
                'closeButton' => true,
            ]);
            // Redirect back or handle accordingly
            return back();
        }
        $terminaldetails = Terminal::getterminaldetails($request->input('selected_terminal_id'));//get terminal details

         // Parse the dates using Carbon
         $fromDate = Carbon::parse($request->input('parking_from_date'));
         $tillDate = Carbon::parse($request->input('parking_till_date'));
        // Calculate the difference in days and include the last day (+1)
        $dayscount =  $fromDate->diffInDays($tillDate);
        if($dayscount > 32){
            notify()->error('Parking dates must be within 31 days', 'Error');
            return back(); // Stop further processing
        }
        $bookingprice = Bookingprice::getbookingcount($dayscount);
         // Check if the booking price is null or empty
         if (empty($bookingprice) || $bookingprice->isEmpty()) {
            session()->flash('error', 'No price found for the selected days. Please check your input.');
            return back(); // Redirect back with an error message
        }
        // This will output the difference in days
        $price = $bookingprice[0]->booking_price;

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
                $totalprice = $price;
            }
            // If promo details are empty, totalprice will remain unchanged (equal to $price)
        }else{
            $totalprice = $price;
        }

        $fromDate = Carbon::parse($request->input('parking_from_date'))->format('Y-m-d');
        $fromHour = $request->input('parking_from_hour');
        $fromMin = $request->input('parking_from_min');
        $tillDate = Carbon::parse($request->input('parking_till_date'))->format('Y-m-d');
        $tillHour = $request->input('parking_till_hour');
        $tillMin = $request->input('parking_till_min');

         Session::put('price', $price);
         Session::put('discount', $discountamount ?? 0);
         Session::put('terminalid', $request->input('selected_terminal_id'));
         Session::put('terminalname', $terminaldetails[0]->name);
         Session::put('airport', $request->input('airport'));
         Session::put('promocode', $promocode);

        //  Session::put('fromHour',$fromHour);
        //  Session::put('fromMin',$fromMin);
        //  Session::put('tillHour',$tillHour);
        //  Session::put('tillMin',$tillMin);

         return Redirect::route('showcheckout');

    }

    public function selectcustomerlogin(Request $request){
        // Check if selected_terminal_id is provided
        if (!$request->input('selected_terminal_id')) {
            notify()->error('Terminal ID is required!', 'Missing Data', [
                'position' => 'top-right',
                'closeButton' => true,
            ]);
            // Redirect back or handle accordingly
            return back();
        }
        $terminaldetails = Terminal::getterminaldetails($request->input('selected_terminal_id'));//get terminal details
         // Parse the dates using Carbon
         $fromDate = Carbon::parse($request->input('parking_from_date'));
         $tillDate = Carbon::parse($request->input('parking_till_date'));
        // Calculate the difference in days and include the last day (+1)
         // Check if fromDate is greater than or equal to tillDate
        //  if ($fromDate->greaterThanOrEqualTo($tillDate)) {
        //      session()->flash('error', 'Parking start date must be before the end date.');
        //      return back(); // Stop further processing
        //  }
        $dayscount =  $fromDate->diffInDays($tillDate);

        if($dayscount > 32){
            notify()->error('Parking dates must be within 31 days', 'Error');
            return back(); // Stop further processing
        }
        $bookingprice = Bookingprice::getbookingcount($dayscount);
         // Check if the booking price is null or empty
         if (empty($bookingprice) || $bookingprice->isEmpty()) {
            session()->flash('error', 'No price found for the selected days. Please check your input.');
            return back(); // Redirect back with an error message
        }
        // This will output the difference in days
        $price = $bookingprice[0]->booking_price;
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
                $totalprice = $price;
            }
            // If promo details are empty, totalprice will remain unchanged (equal to $price)
        }else{
            $totalprice = $price;
        }

         $fromDate = Carbon::parse($request->input('parking_from_date'))->format('Y-m-d');
         $fromTime = $request->input('from_time');
         $tillDate = $tillDate = Carbon::parse($request->input('parking_till_date'))->format('Y-m-d');
         $tillTime = $request->input('till_time');

         Session::put('price', $price);
         Session::put('discount', $discountamount ?? 0);
         Session::put('terminalid', $request->input('selected_terminal_id'));
         Session::put('terminalname', $terminaldetails[0]->name);
         Session::put('airport', $request->input('airport'));
         Session::put('promocode', $promocode);

         return Redirect::route('selectcustomerloginview');

    }

    public function selectcustomerloginview(){

        $allterminallists = Terminal::all();
        $fDate =  Session::get('fromDate');
        $fHour =  Session::get('fromHour');
        $fMin =  Session::get('fromMin');
        $tDate =  Session::get('tillDate');
        $tHour =  Session::get('tillHour');
        $tMin =  Session::get('tillMin');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promocode');
        $airport =  Session::get('airport');

        $price =  Session::get('price');
        $discount =  Session::get('discount');
        $terminalid =  Session::get('terminalid');
        $terminalname =  Session::get('terminalname');

        return view('web.logincustomerguest',compact('allterminallists','terminalid','fDate','fHour','fMin','tDate','tHour','tMin','tPrice','pCode','price','discount','terminalname','airport'));

    }

     // customer register view
     public function showbookingcustomerregister(){

        $allterminallists = Terminal::all();
        $fDate =  Session::get('fromDate');
        $fHour =  Session::get('fromHour');
        $fMin =  Session::get('fromMin');
        $tDate =  Session::get('tillDate');
        $tHour =  Session::get('tillHour');
        $tMin =  Session::get('tillMin');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promocode');
        $airport =  Session::get('airport');

        $price =  Session::get('price');
        $discount =  Session::get('discount');
        $terminalid =  Session::get('terminalid');
        $terminalname =  Session::get('terminalname');

        return view('web.bookingcustomerregister',compact('allterminallists','terminalid','fDate','fHour','fMin','tDate','tHour','tMin','tPrice','pCode','price','discount','terminalname','airport'));
    }

    // insert customer
    public function storebookingcustomerregister(StoreCustomerRequest $request){

        $allterminallists = Terminal::all();
        $fDate =  Session::get('fromDate');
        $fHour =  Session::get('fromHour');
        $fMin =  Session::get('fromMin');
        $tDate =  Session::get('tillDate');
        $tHour =  Session::get('tillHour');
        $tMin =  Session::get('tillMin');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promocode');
        $airport =  Session::get('airport');

        $price =  Session::get('price');
        $discount =  Session::get('discount');
        $terminalid =  Session::get('terminalid');
        $terminalname =  Session::get('terminalname');

        $validatedData = $request->all();
        $account = Customer::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone_no' => $validatedData['phone_no'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::guard('account')->login($account);

        $cusid = null;
        $cusfname = null;
        $cuslname = null;
        $cusemail = null;
        $cusphoneno = null;

        // Check if the customer is logged in
        if (Auth::guard('account')->check()) {
            $customer = Auth::guard('account')->user();
            $cusid = $customer->id;
            $cusfname = $customer->first_name;
            $cuslname = $customer->last_name;
            $cusemail = $customer->email;
            $cusphoneno = $customer->phone_no;

            // Store in session
            Session::put('cusid', $cusid);
            Session::put('cusfirstname', $cusfname);
            Session::put('cuslastname', $cuslname);
            Session::put('cusemail', $cusemail);
            Session::put('cusphoneno', $cusphoneno);
        } elseif (Session::has('cusid')) {
            // Retrieve existing session data
            $cusid = Session::get('cusid');
            $cusfname = Session::get('cusfirstname');
            $cuslname = Session::get('cuslastname');
            $cusemail = Session::get('cusemail');
            $cusphoneno = Session::get('cusphoneno');
        }
        // return Redirect::route('showlogin');
        // return redirect()->route('customer.dashboard');
        return view('web.checkout',compact('allterminallists','terminalid','fDate','fHour','fMin','tDate','tHour','tMin','tPrice','pCode','price','discount','cusfname','cuslname','cusemail','cusphoneno','terminalname','cusid','airport'));
    }

    // show checkout page
    public function guestshowcheckout(){

        $allterminallists = Terminal::all();
        $fDate =  Session::get('fromDate');
        $fHour =  Session::get('fromHour');
        $fMin =  Session::get('fromMin');
        $tDate =  Session::get('tillDate');
        $tHour =  Session::get('tillHour');
        $tMin =  Session::get('tillMin');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promocode');
        $airport =  Session::get('airport');

        $price =  Session::get('price');
        $discount =  Session::get('discount');
        $terminalid =  Session::get('terminalid');
        $terminalname =  Session::get('terminalname');

        return view('web.guestcheckout',compact('allterminallists','terminalid','fDate','fHour','fMin','tDate','tHour','tMin','tPrice','pCode','price','discount','terminalname','airport'));

    }


    // Insert customer
    public function returningcustomerlogin(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the customer using the 'account' guard
        if (Auth::guard('account')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Fetch the authenticated customer
            $customer = Auth::guard('account')->user();
            $cusid = $customer->id;
            $cusfname = $customer->first_name;
            $cuslname = $customer->last_name;
            $cusemail = $customer->email;
            $cusphoneno = $customer->phone_no;
            // Store the customer ID in the session
            Session::put('cusid', $cusid);
            Session::put('cusfirstname', $cusfname);
            Session::put('cuslastname', $cuslname);
            Session::put('cusemail', $cusemail);
            Session::put('cusphoneno', $cusphoneno);

            // Fetch session data and any required details for the checkout page
            $allterminallists = Terminal::all();
            $fDate = Session::get('fromDate');
            $fHour =  Session::get('fromHour');
            $fMin =  Session::get('fromMin');
            $tDate =  Session::get('tillDate');
            $tHour =  Session::get('tillHour');
            $tMin =  Session::get('tillMin');
            $tPrice = Session::get('totalPrice');
            $pCode = Session::get('promocode');
            $airport = Session::get('airport');
            $price = Session::get('price');
            $discount = Session::get('discount');
            $terminalid = Session::get('terminalid');
            $terminalname = Session::get('terminalname');

            $cusid = Session::get('cusid');
            $cusfname = Session::get('cusfirstname');
            $cuslname = Session::get('cuslastname');
            $cusemail = Session::get('cusemail');
            $cusphoneno = Session::get('cusphoneno');

            // Redirect to the checkout page with all necessary data
            return view('web.checkout', compact(
                'allterminallists',
                'terminalid',
                'fDate',
                'fHour',
                'fMin',
                'tDate',
                'tHour',
                'tMin',
                'tPrice',
                'pCode',
                'price',
                'discount',
                'terminalname',
                'cusid',
                'airport',
                'cusfname','cuslname','cusemail','cusphoneno'
            ));
        }
        // If authentication fails, return back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function bookingedit(Request $request){

        try {
            // Validate the request
            $request->validate([
                'parking_from_date' => 'required|date',
                'parking_till_date' => 'required|date',
                'parking_from_hour' => 'required',
                'parking_from_min'=> 'required',
                'parking_till_hour'=> 'required',
                'parking_till_min'=>'required',
                'promocode' => 'nullable|string',
                'airport' => 'required|string'
            ]);
            // Parse the dates using Carbon
            $fromDate = Carbon::parse($request->input('parking_from_date'));
            $tillDate = Carbon::parse($request->input('parking_till_date'));

           // Calculate the difference in days and include the last day (+1)
           $dayscount =  $fromDate->diffInDays($tillDate);
           if($dayscount > 32){
                session()->flash('error', 'Parking dates must be within 31 days', 'Error');
                return back(); // Stop further processing
            }
           $bookingprice = Bookingprice::getbookingcount($dayscount);
        //    dd($bookingprice);

              // Check if the booking price is null or empty
              if (empty($bookingprice) || $bookingprice->isEmpty()) {
                session()->flash('error', 'No price found for the selected days. Please check your input.');
                return back(); // Redirect back with an error message
            }
            // This will output the difference in days
            $price = $bookingprice[0]->booking_price;

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
                    $totalprice = $price;
                }
                // If promo details are empty, totalprice will remain unchanged (equal to $price)
            }else{
                $totalprice = $price;
            }
             $fromDate = Carbon::parse($request->input('parking_from_date'))->format('Y-m-d');
             $fromTime = $request->input('from_time');
             $tillDate = $tillDate = Carbon::parse($request->input('parking_till_date'))->format('Y-m-d');
             $tillTime = $request->input('till_time');

            // Perform the price calculations and session updates (your existing logic)
             Session::put('totalPrice', $totalprice);
             Session::put('discount', $discountamount ?? 0);
             Session::put('airport', $request->input('airport'));
             Session::put('promoCode', $promocode);
             Session::put('fromDate', $fromDate);
             Session::put('fromTime', $fromTime);
             Session::put('tillDate', $tillDate);
             Session::put('tillTime', $tillTime);

             notify()->success('Booking updated successfully.', 'Success');
            // Return a success response if everything is valid
            return response()->json(['success' => true, 'message' => 'Booking updated successfully']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation errors as JSON
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => 'An unexpected error occurred'], 500);
        }
    }
    //show complete page
    public function completepage(){
        return view('web.completed');
    }
     //show complete page
     public function failed(){
        return view('web.failed');
    }

    // show terms and condition page
    public function termsandcondition(){
        return view('web.termsandcondition');
    }
    //show privacypolicy page
    public function privacypolicy(){
        return view('web.privacypolice');
    }
    //show resetpassword page
    public function resetpassword(){
        return view('web.resetpassword');
    }

    public function sendresetpassword(Request $request){

        $request->validate([
            'email' => 'required|email|exists:customer,email'
        ]);
        $token = Str::random(60);

        AcoountPasswordResetToken::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'email' => $request->email,
                'token' => $token,
            ]
        );

        Mail::to($request->email)->send(new ResetPasswordMail($token));
        notify()->success('Check your mail,We have emailed your password reset link.', 'Success');
        return Redirect::route('resetpassword');
    }
    //show validatereset password
    public function validateresetpassword(Request $request,$token){
       $oldtoken  =  AcoountPasswordResetToken::where('token',$token)->first();
       $oldtoken = $oldtoken->token;
       if(!$token){

            notify()->error('Email is invalid', 'Erorr');
            return Redirect::route('showlogin');
       }
        return view('web.validateresetpassword',compact('token'));
    }

    public function sendvalidateresetpassword(Request $request){

        $validatedData = $request->validate([
            'password' =>'required|confirmed|min:8'
        ]);

        $token =  AcoountPasswordResetToken::where('token',$request->token)->first();

        if(!$token){
            notify()->error('Token is invallid', 'Erorr');
            return Redirect::route('showlogin');
        }
        $customer = Customer::where('email',$token->email)->first();

        if(!$customer){
            notify()->error('Email is invalid', 'Erorr');
            return Redirect::route('showlogin');
        }

        $customer->update([
            'password' => Hash::make($request->password)
        ]);

        $token->delete();
        notify()->success('Password Reset Scuccessfully', 'Success');
        return Redirect::route('showlogin');

    }

     //
     public function selectCustomer(){
        return view('web.selectcustomer');
    }

}
