<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\CompanySettings;

// web
Route::get('/',[App\Http\Controllers\WebController::class,'index'])->name('/');

// Route::prefix('web')->group(function(){

//     Route::middleware('guest:web')->group(function() {
//         Route::get('/cuslogin', function () {
//             return view('web.login');
//         });
//     });
//     // Route::get('/login',[App\Http\Controllers\WebController::class,'login'])->name('/login');
// });

// Customer routes (login, register)
Route::prefix('account')->group(function () {
    Route::get('/login', [App\Http\Controllers\WebController::class, 'showlogin'])->name('showlogin');
    Route::post('/login', [App\Http\Controllers\WebController::class, 'authenticate'])->name('authenticate');

    Route::get('/resetpassword', [App\Http\Controllers\WebController::class, 'resetpassword'])->name('resetpassword');
    Route::post('/sendresetpassword', [App\Http\Controllers\WebController::class, 'sendresetpassword'])->name('sendresetpassword');

    Route::get('/validateresetpassword/{token}', [App\Http\Controllers\WebController::class, 'validateresetpassword'])->name('validateresetpassword');
    Route::post('/sendvalidateresetpassword', [App\Http\Controllers\WebController::class, 'sendvalidateresetpassword'])->name('sendvalidateresetpassword');

    Route::get('/contactus', [App\Http\Controllers\WebController::class, 'contactus'])->name('contactus');
    Route::post('/storecontactus', [App\Http\Controllers\ContactController::class, 'store'])->name('storecontactus');

    Route::get('/aboutus', [App\Http\Controllers\WebController::class, 'aboutus'])->name('aboutus');
    Route::get('/howitworks', [App\Http\Controllers\WebController::class, 'howitworks'])->name('howitworks');

    Route::get('/showterminal', [App\Http\Controllers\WebController::class, 'showterminal'])->name('showterminal');
    Route::get('/showcheckout', [App\Http\Controllers\WebController::class, 'showcheckout'])->name('showcheckout');
    Route::get('/privacypolicy', [App\Http\Controllers\WebController::class, 'privacypolicy'])->name('privacypolicy');
    Route::get('/termsandcondition', [App\Http\Controllers\WebController::class, 'termsandcondition'])->name('termsandcondition');

    Route::get('/showbookingone', [App\Http\Controllers\WebController::class, 'showbookingone'])->name('showbookingone');
    Route::get('/showbooking', [App\Http\Controllers\WebController::class, 'showbooking'])->name('showbooking');
    Route::post('/bookingdetailstep2', [App\Http\Controllers\WebController::class, 'bookingdetailstep2'])->name('bookingdetailstep2');
    Route::post('/bookingdetailstep3', [App\Http\Controllers\WebController::class, 'bookingdetailstep3'])->name('bookingdetailstep3');

    Route::post('/bookingedit', [App\Http\Controllers\WebController::class, 'bookingedit'])->name('bookingedit');

    Route::get('/register', [App\Http\Controllers\WebController::class, 'showregister'])->name('showregister');
    Route::post('/storeregister', [App\Http\Controllers\WebController::class, 'storeregister'])->name('storeregister');

    Route::post('/accountLogout', [App\Http\Controllers\WebController::class, 'accountLogout'])->name('account.logout');
    Route::post('/storebooking',[App\Http\Controllers\BookingController::class,'store'])->name('storebooking');
    Route::get('/completepage', [App\Http\Controllers\WebController::class, 'completepage'])->name('completepage');
    Route::get('/failed', [App\Http\Controllers\WebController::class, 'failed'])->name('failed');

    Route::get('/success', [App\Http\Controllers\BookingController::class, 'handlePaymentSuccess'])->name('success');



    // Guest routes (for customers who are not logged in)
    Route::middleware('guest:account')->group(function() {
        // Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');


        Route::middleware('auth:account')->group(function() {


            // Route::get('/dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');

        });
    });

    // Authenticated customer routes

});

Route::get('/error', function () {
    return view('errors.errors');
});
Route::prefix('admin')->group(function(){
    Route::get('/login', function () {
        return view('auth.login');
    });
     // Routes accessible by both admin and driver
     Route::middleware([RoleMiddleware::class .':admin,driver'])->group(function () {

        Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
        // allbooking
        Route::get('/getmontlybooking',[App\Http\Controllers\DashboardController::class,'getmontlybooking'])->name('getmontlybooking');
        Route::get('/gettodayincomebooking',[App\Http\Controllers\DashboardController::class,'gettodayincomebooking'])->name('gettodayincomebooking');
        Route::get('/getcurrentmonthrevenue',[App\Http\Controllers\DashboardController::class,'getcurrentmonthrevenue'])->name('getcurrentmonthrevenue');
        Route::get('/gettodayincomerevenue',[App\Http\Controllers\DashboardController::class,'gettodayincomerevenue'])->name('gettodayincomerevenue');
        Route::get('/allbooking',[App\Http\Controllers\BookingController::class,'index'])->name('allbooking');
        Route::get('/viewbooking/{id}',[App\Http\Controllers\BookingController::class,'show'])->name('viewbooking');
        // status range filter booking
        Route::get('/statusfilterbooking',[App\Http\Controllers\BookingController::class,'statusfilter'])->name('statusfilterbooking');
        Route::post('/getfilterbookingstatus',[App\Http\Controllers\BookingController::class,'getfilterbookingstatus'])->name('getfilterbookingstatus');
        // date range filter booking
        Route::get('/datefilterbooking',[App\Http\Controllers\BookingController::class,'datefilter'])->name('datefilterbooking');
        Route::post('/getfilterbookingdate',[App\Http\Controllers\BookingController::class,'getfilterbookingdate'])->name('getfilterbookingdate');
        // income booking
        Route::get('/incomebooking',[App\Http\Controllers\BookingController::class,'incomebook'])->name('incomebooking');
        Route::post('/getfilterincomebooking',[App\Http\Controllers\BookingController::class,'getfilterincomebooking'])->name('getfilterincomebooking');
        // outgoing
        Route::get('/outgoingbooking',[App\Http\Controllers\BookingController::class,'outgoingbooking'])->name('outgoingbooking');
        Route::post('/getfilteroutgoingbooking',[App\Http\Controllers\BookingController::class,'getfilteroutgoingbooking'])->name('getfilteroutgoingbooking');
        // print booking
         Route::get('/printbookingdetails/{id}',[App\Http\Controllers\ReportController::class,'printbookingdetails'])->name('printbookingdetails');
         Route::get('/printbooking/{id}',[App\Http\Controllers\BookingController::class,'printbooking'])->name('printbooking');
         Route::get('/printbooking1/{id}',[App\Http\Controllers\BookingController::class,'printbooking1'])->name('printbooking1');
         Route::get('/todayprintbookingdetails/{id}',[App\Http\Controllers\ReportController::class,'todayprintbookingdetails'])->name('todayprintbookingdetails');
         Route::get('/currentmonthprintbookingdetails/{id}',[App\Http\Controllers\ReportController::class,'currentmonthprintbookingdetails'])->name('currentmonthprintbookingdetails');
         // user
         Route::get('/alluserlist',[App\Http\Controllers\UserController::class,'index'])->name('alluserlist');
         Route::post('/logoutuser',[App\Http\Controllers\UserController::class,'logoutuser'])->name('logoutuser');

        // vehicle photo
        Route::post('/uploadvehiclephoto',[App\Http\Controllers\BookingController::class,'uploadvehiclephoto'])->name('uploadvehiclephoto');
        Route::post('/upload',[App\Http\Controllers\BookingController::class, 'upload'])->name('upload');

        // booking details
        Route::get('/zoomimage/{id}',[App\Http\Controllers\BookingController::class,'zoomimage'])->name('zoomimage');

    });
    Route::middleware([AdminMiddleware::class . ':admin'])->group(function () {
        // booking details
        Route::get('/editbooking/{id}',[App\Http\Controllers\BookingController::class,'edit'])->name('editbooking');
        Route::put('/updatebooking',[App\Http\Controllers\BookingController::class,'update'])->name('updatebooking');
        Route::delete('/deletebookingdetails/{id}',[App\Http\Controllers\BookingController::class,'destroy'])->name('deletebookingdetails');
        Route::delete('/canclebookingdetails/{id}',[App\Http\Controllers\BookingController::class,'cancle'])->name('canclebookingdetails');

       // promocode module
        Route::get('/allpromolist',[App\Http\Controllers\PromocodeController::class,'index'])->name('allpromolist');
        Route::get('/createpromocode',[App\Http\Controllers\PromocodeController::class,'create'])->name('createpromocode');
        Route::post('/storepromocode',[App\Http\Controllers\PromocodeController::class,'store'])->name('storepromocode');
        Route::get('/editpromocode/{id}',[App\Http\Controllers\PromocodeController::class,'edit'])->name('editpromocode');
        Route::put('/updatepromocode',[App\Http\Controllers\PromocodeController::class,'update'])->name('updatepromocode');
        Route::delete('/deletepromocode/{id}',[App\Http\Controllers\PromocodeController::class,'destroy'])->name('deletepromocode');
        // terminal module
        Route::get('/allterminal',[App\Http\Controllers\TerminalController::class,'index'])->name('allterminal');
        Route::get('/createterminal',[App\Http\Controllers\TerminalController::class,'create'])->name('createterminal');
        Route::post('/storeterminal',[App\Http\Controllers\TerminalController::class,'store'])->name('storeterminal');
        Route::get('/editterminal/{id}',[App\Http\Controllers\TerminalController::class,'edit'])->name('editterminal');
        Route::put('/updateterminal',[App\Http\Controllers\TerminalController::class,'update'])->name('updateterminal');
        Route::delete('/deleteterminal/{id}',[App\Http\Controllers\TerminalController::class,'destroy'])->name('deleteterminal');

        // today report
        Route::get('/todayreport',[App\Http\Controllers\ReportController::class,'todayreport'])->name('todayreport');
        Route::post('/todayreportprint',[App\Http\Controllers\ReportController::class,'todayreportprint'])->name('todayreportprint');
        Route::delete('/todayreportdelete',[App\Http\Controllers\ReportController::class,'todayreportdelete'])->name('todayreportdelete');
        Route::get('/todaypdf',[App\Http\Controllers\ReportController::class,'todaypdf'])->name('todaypdf');
        //today outgoing report
        Route::get('/todayoutgoingreport',[App\Http\Controllers\ReportController::class,'todayoutgoingreport'])->name('todayoutgoingreport');
        Route::post('/todayoutgoingprint',[App\Http\Controllers\ReportController::class,'todayoutgoingprint'])->name('todayoutgoingprint');
        Route::get('/todayoutgoingpdf',[App\Http\Controllers\ReportController::class,'todayoutgoingpdf'])->name('todayoutgoingpdf');

        //current month report
        Route::get('/currentmonthreport',[App\Http\Controllers\ReportController::class,'currentmonthreport'])->name('currentmonthreport');
        Route::post('/currentmonthreportprint',[App\Http\Controllers\ReportController::class,'currentmonthreportprint'])->name('currentmonthreportprint');
        Route::delete('/currentmonthreportdelete',[App\Http\Controllers\ReportController::class,'currentmonthreportdelete'])->name('currentmonthreportdelete');
        Route::get('/currentmonthpdf',[App\Http\Controllers\ReportController::class,'currentmonthpdf'])->name('currentmonthpdf');

        //today revenue report
        Route::get('/todayrevenuereport',[App\Http\Controllers\ReportController::class,'todayrevenuereport'])->name('todayrevenuereport');
        // Route::post('/currentmonthreportprint',[App\Http\Controllers\ReportController::class,'currentmonthreportprint'])->name('currentmonthreportprint');
        // Route::delete('/currentmonthreportdelete',[App\Http\Controllers\ReportController::class,'currentmonthreportdelete'])->name('currentmonthreportdelete');
        Route::get('/todayrevenuepdf',[App\Http\Controllers\ReportController::class,'todayrevenuepdf'])->name('todayrevenuepdf');

        //month to date revenue report
        Route::get('/monthtodaterevenuereport',[App\Http\Controllers\ReportController::class,'monthtodaterevenuereport'])->name('monthtodaterevenuereport');
        // Route::post('/currentmonthreportprint',[App\Http\Controllers\ReportController::class,'currentmonthreportprint'])->name('currentmonthreportprint');
        // Route::delete('/currentmonthreportdelete',[App\Http\Controllers\ReportController::class,'currentmonthreportdelete'])->name('currentmonthreportdelete');
        Route::get('/monthtodaterevenuepdf',[App\Http\Controllers\ReportController::class,'monthtodaterevenuepdf'])->name('monthtodaterevenuepdf');

        //year revenue report
        Route::get('/yearrevenuereport',[App\Http\Controllers\ReportController::class,'yearrevenuereport'])->name('yearrevenuereport');
        // Route::post('/currentmonthreportprint',[App\Http\Controllers\ReportController::class,'currentmonthreportprint'])->name('currentmonthreportprint');
        // Route::delete('/currentmonthreportdelete',[App\Http\Controllers\ReportController::class,'currentmonthreportdelete'])->name('currentmonthreportdelete');
        Route::get('/yearrevenuepdf',[App\Http\Controllers\ReportController::class,'yearrevenuepdf'])->name('yearrevenuepdf');

        // booking module
        Route::get('/createbooking',[App\Http\Controllers\BookingController::class,'create'])->name('createbooking');
        // Route::post('/storebooking',[App\Http\Controllers\BookingController::class,'store'])->name('storebooking');
        // contact
        Route::get('/allcontact',[App\Http\Controllers\ContactController::class,'index'])->name('allcontact');
        Route::delete('/deletecontact/{id}',[App\Http\Controllers\ContactController::class,'destroy'])->name('deletecontact');
        //company setting
        Route::get('/csetting',[App\Http\Controllers\SettingController::class,'edit'])->name('csetting');
        Route::put('/updatecsetting',[App\Http\Controllers\SettingController::class,'update'])->name('updatecsetting');
        Route::post('/storecsetting',[App\Http\Controllers\SettingController::class,'store'])->name('storecsetting');
        // user
        Route::get('/createuser',[App\Http\Controllers\UserController::class,'create'])->name('createuser');
        Route::post('/storeuser',[App\Http\Controllers\UserController::class,'store'])->name('storeuser');
        Route::get('/edituser/{id}',[App\Http\Controllers\UserController::class,'edit'])->name('edituser');
        Route::put('/updateuser',[App\Http\Controllers\UserController::class,'update'])->name('updateuser');
        Route::delete('/deleteuser/{id}',[App\Http\Controllers\UserController::class,'destroy'])->name('deleteuser');
        //bookinprice
        Route::get('/allbookingprice',[App\Http\Controllers\BookingpriceController::class,'index'])->name('allbookingprice');
        Route::get('/createbookingprice',[App\Http\Controllers\BookingpriceController::class,'create'])->name('createbookingprice');
        Route::post('/storebookingprice',[App\Http\Controllers\BookingpriceController::class,'store'])->name('storebookingprice');
        Route::get('/editbookingprice/{id}',[App\Http\Controllers\BookingpriceController::class,'edit'])->name('editbookingprice');
        Route::put('/updatebookingprice',[App\Http\Controllers\BookingpriceController::class,'update'])->name('updatebookingprice');
        Route::delete('/deletebookingprice/{id}',[App\Http\Controllers\BookingpriceController::class,'destroy'])->name('deletebookingprice');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



