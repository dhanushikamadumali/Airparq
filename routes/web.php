<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

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

// booking module
Route::get('/allbooking',[App\Http\Controllers\BookingController::class,'index'])->name('allbooking');
Route::get('/createbooking',[App\Http\Controllers\BookingController::class,'create'])->name('createbooking');
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

// vehicle photo
Route::post('/uploadvehiclephoto',[App\Http\Controllers\BookingController::class,'uploadvehiclephoto'])->name('uploadvehiclephoto');

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

Route::post('/storebooking',[App\Http\Controllers\BookingController::class,'store'])->name('storebooking');
Route::get('/editbooking/{id}',[App\Http\Controllers\BookingController::class,'edit'])->name('editbooking');
Route::put('/updatebooking',[App\Http\Controllers\BookingController::class,'update'])->name('updatebooking');
Route::delete('/deletebooking/{id}',[App\Http\Controllers\BookingController::class,'destroy'])->name('deletebooking');

// contact
Route::get('/allcontact',[App\Http\Controllers\ContactController::class,'index'])->name('allcontact');
Route::delete('/deletecontact/{id}',[App\Http\Controllers\ContactController::class,'destroy'])->name('deletecontact');


//company setting
Route::get('/csetting',[App\Http\Controllers\SettingController::class,'edit'])->name('csetting');
Route::put('/updatecsetting',[App\Http\Controllers\SettingController::class,'update'])->name('updatecsetting');


// setting
Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role');
Route::get('/permission', [App\Http\Controllers\RoleController::class, 'index'])->name('permission');
Route::get('/permission', [App\Http\Controllers\RoleController::class, 'index'])->name('rolepermission');
Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
