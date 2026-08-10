<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['customer', 'package'])->get();

        return view('bookings.index', [
            'bookings' => $bookings,
        ]);
    }

    public function create()
    {
        $customers = Customer::all();
        $packages = Package::all();

        return view('bookings.create', [
            'customers' => $customers,
            'packages' => $packages,
        ]);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'package_id' => 'required|exists:packages,id',
        'travel_date' => 'required|date|after_or_equal:today',
        'number_of_travelers' => 'required|integer|min:1',
        'status' => 'required|in:pending,confirmed,completed,cancelled',
    ]);

    $package = Package::findOrFail($validated['package_id']);

    $validated['unit_price'] = $package->price;
    $validated['total_price'] = $package->price * $validated['number_of_travelers'];

    Booking::create($validated);

    return redirect()->route('bookings.index');
}

    public function edit(Booking $booking)
    {
        $customers = Customer::all();
        $packages = Package::all();

        return view('bookings.edit', [
            'booking' => $booking,
            'customers' => $customers,
            'packages' => $packages,
        ]);
    }

    public function update(Request $request, Booking $booking)
{
    $validated = $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'package_id' => 'required|exists:packages,id',
        'travel_date' => 'required|date|after_or_equal:today',
        'number_of_travelers' => 'required|integer|min:1',
        'status' => 'required|in:pending,confirmed,completed,cancelled',
    ]);

    if (
        $validated['package_id'] != $booking->package_id ||
        $validated['number_of_travelers'] != $booking->number_of_travelers
    ) {
        $package = Package::findOrFail($validated['package_id']);

        $validated['unit_price'] = $package->price;
        $validated['total_price'] = $package->price * $validated['number_of_travelers'];
    }

    $booking->update($validated);

    return redirect()->route('bookings.index');
}

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index');
    }
}