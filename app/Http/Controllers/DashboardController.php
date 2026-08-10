<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use App\Models\Destination;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'customerCount' => Customer::count(),
            'packageCount' => Package::count(),
            'destinationCount' => Destination::count(),
            'bookingCount' => Booking::count(),
        ]);
    }
}