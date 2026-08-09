<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;

Route::resource('destinations', DestinationController::class);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('customers', CustomerController::class);
Route::resource('packages', PackageController::class);