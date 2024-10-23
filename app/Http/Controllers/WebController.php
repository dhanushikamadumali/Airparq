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

class WebController extends Controller
{
    public function __construct(){
        $this->middleware(CompanySettings::class);
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allpromocodelists = Promocode::all();
        $fDate =  Session::get('fromDate');
        $fTime =  Session::get('fromTime');
        $tDate =  Session::get('tillDate');
        $tTime =  Session::get('tillTime');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promoCode');
        $airport =  Session::get('airport');


        return view('web.index',compact('fDate','fTime','tDate','tTime','tPrice','pCode','airport','allpromocodelists'));
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
        $fTime =  Session::get('fromTime');
        $tDate =  Session::get('tillDate');
        $tTime =  Session::get('tillTime');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promoCode');
        $airport =  Session::get('airport');

        return view('web.booking',compact('allterminallists','fDate','fTime','tDate','tTime','tPrice','pCode','airport'));
    }
    //show bookingone page
    public function showbookingone(){


        $fDate =  Session::get('fromDate');
        $fTime =  Session::get('fromTime');
        $tDate =  Session::get('tillDate');
        $tTime =  Session::get('tillTime');
        $tPrice =  Session::get('totalPrice');
        $pCode =  Session::get('promoCode');
        $airport =  Session::get('airport');

        return view('web.bookingone',compact('fDate','fTime','tDate','tTime','tPrice','pCode','airport'));
    }
    // show checkout page
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
            'parking_from_date' => 'required|date',
            'parking_from_time' => 'required',
            'parking_till_date' => 'required|date',
            'parking_till_time' => 'required',
            'promocode' => 'required|string',

        ]);

        $allterminallists = Terminal::all();
         // Parse the dates using Carbon
         $fromDate = Carbon::parse($request->input('parking_from_date'));
         $tillDate = Carbon::parse($request->input('parking_till_date'));
        // Check if the months are the same
        if ($fromDate->month !== $tillDate->month) {
            notify()->error('Parking dates must be within the same month', 'Error', [
                'position' => 'bottom-right'
            ]);
            return back(); // Stop further processing
        }
        // Calculate the difference in days and include the last day (+1)
        $dayscount = $fromDate->diffInDays($tillDate) + 1;

        $bookingprice = Bookingprice::getbookingcount($dayscount);

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
         // If authenticated, retrieve the authenticated user details
         $customer = Auth::guard('account')->user();
         $cuid = $customer->id;

         $cufirstname = $customer->first_name; // or $customer->fname depending on your model
         $culastname = $customer->last_name; // or $customer->lname depending on your model
         $cuemail = $customer->email; // or $customer->email depending on your model
         $cuphoneno = $customer->phone_no; // or $customer->phone_no depending on your model

         // Parse the dates using Carbon
         $fromDate = Carbon::parse($request->input('parking_from_date'));
         $tillDate = Carbon::parse($request->input('parking_till_date'));
        // Check if the months are the same
        if ($fromDate->month !== $tillDate->month) {
            notify()->error('Parking dates must be within the same month', 'Error', [
                'position' => 'bottom-right'
            ]);
            return back(); // Stop further processing
        }
        // Calculate the difference in days and include the last day (+1)
        $dayscount =  $fromDate->diffInDays($tillDate) + 1;

        $bookingprice = Bookingprice::getbookingcount($dayscount);

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
                notify()->error('Failed to insert promocode.', 'Error', [
                    'position' => 'top-right' // Change this to your desired position
                ]);
            }
            // If promo details are empty, totalprice will remain unchanged (equal to $price)
        }

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
    public function bookingedit(Request $request){

        try {
            // Validate the request
            $request->validate([
                'selected_terminal_id' => 'required',
                'parking_from_date' => 'required|date',
                'from_time' => 'required',
                'parking_till_date' => 'required|date',
                'till_time' => 'required',
                'promocode' => 'nullable|string',
                'airport' => 'required|string'
            ]);
               if(!Auth::guard('account')->check()){
                return  Redirect::route('showlogin');
            }
            $terminaldetails = Terminal::getterminaldetails($request->input('selected_terminal_id'));//get terminal details
            // If authenticated, retrieve the authenticated user details
            $customer = Auth::guard('account')->user();
            $cuid = $customer->id;

            $cufirstname = $customer->first_name; // or $customer->fname depending on your model
            $culastname = $customer->last_name; // or $customer->lname depending on your model
            $cuemail = $customer->email; // or $customer->email depending on your model
            $cuphoneno = $customer->phone_no; // or $customer->phone_no depending on your model

            // Parse the dates using Carbon
            $fromDate = Carbon::parse($request->input('parking_from_date'));
            $tillDate = Carbon::parse($request->input('parking_till_date'));
           // Check if the months are the same
           if ($fromDate->month !== $tillDate->month) {
               notify()->error('Parking dates must be within the same month', 'Error', [
                   'position' => 'bottom-right'
               ]);
               return back(); // Stop further processing
           }

           // Calculate the difference in days and include the last day (+1)
           $dayscount =  $fromDate->diffInDays($tillDate) + 1;
           $bookingprice = Bookingprice::getbookingcount($dayscount);

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
                    return response()->json(['success' => false, 'errors' => 'Failed to insert promocode'], 422);
                }
                // If promo details are empty, totalprice will remain unchanged (equal to $price)
            }
             $fromDate = Carbon::parse($request->input('parking_from_date'))->format('Y-m-d');
             $fromTime = $request->input('from_time');
             $tillDate = $tillDate = Carbon::parse($request->input('parking_till_date'))->format('Y-m-d');
             $tillTime = $request->input('till_time');

            // Perform the price calculations and session updates (your existing logic)
             Session::put('totalPrice', $price);
             Session::put('discount', $discountamount ?? 0);
             Session::put('cusid', $cuid);
             Session::put('cusfirstname', $cufirstname);
             Session::put('cuslastname', $culastname);
             Session::put('cusemail', $cuemail);
             Session::put('cusphoneno', $cuphoneno);
             Session::put('terminalid', $request->input('selected_terminal_id'));
             Session::put('terminalname', $terminaldetails[0]->name);
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
        notify()->success('successfully.', 'Success');
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

}
