<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RoleMiddleware;

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

    Route::get('/contactus', [App\Http\Controllers\WebController::class, 'contactus'])->name('contactus');
    Route::get('/aboutus', [App\Http\Controllers\WebController::class, 'aboutus'])->name('aboutus');
    Route::get('/howitworks', [App\Http\Controllers\WebController::class, 'howitworks'])->name('howitworks');
    Route::get('/showbooking', [App\Http\Controllers\WebController::class, 'showbooking'])->name('showbooking');
    Route::get('/showterminal', [App\Http\Controllers\WebController::class, 'showterminal'])->name('showterminal');
    Route::get('/showcheckout', [App\Http\Controllers\WebController::class, 'showcheckout'])->name('showcheckout');
    Route::get('/privacypolicy', [App\Http\Controllers\WebController::class, 'privacypolicy'])->name('privacypolicy');
    Route::get('/termsandcondition', [App\Http\Controllers\WebController::class, 'termsandcondition'])->name('termsandcondition');


    Route::post('/bookingdetailstep2', [App\Http\Controllers\WebController::class, 'bookingdetailstep2'])->name('bookingdetailstep2');
    Route::post('/bookingdetailstep3', [App\Http\Controllers\WebController::class, 'bookingdetailstep3'])->name('bookingdetailstep3');

    Route::get('/register', [App\Http\Controllers\WebController::class, 'showregister'])->name('showregister');
    Route::post('/storeregister', [App\Http\Controllers\WebController::class, 'storeregister'])->name('storeregister');

    Route::post('/accountLogout', [App\Http\Controllers\WebController::class, 'accountLogout'])->name('account.logout');
    Route::post('/storebooking',[App\Http\Controllers\BookingController::class,'store'])->name('storebooking');
    Route::get('/completepage', [App\Http\Controllers\WebController::class, 'completepage'])->name('completepage');

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
     Route::middleware([RoleMiddleware::class . ':admin,driver'])->group(function () {

        Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
        Route::get('/getmontlybooking',[App\Http\Controllers\DashboardController::class,'getmontlybooking'])->name('getmontlybooking');
        // allbooking
        Route::get('/allbooking',[App\Http\Controllers\BookingController::class,'index'])->name('allbooking');

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
         Route::get('/printbooking/{id}',[App\Http\Controllers\BookingController::class,'printbooking'])->name('printbooking');

        // user
         Route::get('/alluserlist',[App\Http\Controllers\UserController::class,'index'])->name('alluserlist');
         Route::post('/logoutuser',[App\Http\Controllers\UserController::class,'logoutuser'])->name('logoutuser');
    });
    Route::middleware([AdminMiddleware::class . ':admin'])->group(function () {
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

        // vehicle photo
        Route::post('/uploadvehiclephoto',[App\Http\Controllers\BookingController::class,'uploadvehiclephoto'])->name('uploadvehiclephoto');

        Route::post('/upload',[App\Http\Controllers\BookingController::class, 'upload'])->name('upload');

        // today report
        Route::get('/todayreport',[App\Http\Controllers\ReportController::class,'todayreport'])->name('todayreport');
        Route::post('/todayreportprint',[App\Http\Controllers\ReportController::class,'todayreportprint'])->name('todayreportprint');
        Route::delete('/todayreportdelete',[App\Http\Controllers\ReportController::class,'todayreportdelete'])->name('todayreportdelete');
        Route::get('/todaypdf',[App\Http\Controllers\ReportController::class,'todaypdf'])->name('todaypdf');

        //current month report
        Route::get('/currentmonthreport',[App\Http\Controllers\ReportController::class,'currentmonthreport'])->name('currentmonthreport');
        Route::post('/currentmonthreportprint',[App\Http\Controllers\ReportController::class,'currentmonthreportprint'])->name('currentmonthreportprint');
        Route::delete('/currentmonthreportdelete',[App\Http\Controllers\ReportController::class,'currentmonthreportdelete'])->name('currentmonthreportdelete');
        Route::get('/currentmonthpdf',[App\Http\Controllers\ReportController::class,'currentmonthpdf'])->name('currentmonthpdf');

         // booking module
        Route::get('/createbooking',[App\Http\Controllers\BookingController::class,'create'])->name('createbooking');
        // Route::post('/storebooking',[App\Http\Controllers\BookingController::class,'store'])->name('storebooking');
        Route::get('/editbooking/{id}',[App\Http\Controllers\BookingController::class,'edit'])->name('editbooking');
        Route::put('/updatebooking',[App\Http\Controllers\BookingController::class,'update'])->name('updatebooking');
        Route::delete('/deletebooking/{id}',[App\Http\Controllers\BookingController::class,'destroy'])->name('deletebooking');

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

    });
});


// setting
// Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role');
// Route::get('/permission', [App\Http\Controllers\RoleController::class, 'index'])->name('permission');
// Route::get('/permission', [App\Http\Controllers\RoleController::class, 'index'])->name('rolepermission');
// Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



