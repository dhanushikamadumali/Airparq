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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
