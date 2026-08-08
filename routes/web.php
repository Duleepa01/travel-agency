<?php
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;


Route::resource('packages', PackageController::class);
Route::get('/', function () {
    return view('welcome');
});
Route::resource('customers', CustomerController::class);