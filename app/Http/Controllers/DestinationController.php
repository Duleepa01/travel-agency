<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Country;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();

        return view('destinations.index', [
            'destinations' => $destinations,
        ]);
    }

    public function create()
    {
        $countries = Country::all();

        return view('destinations.create', [
            'countries' => $countries,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'country_id' => 'nullable|exists:countries,id',
            'description' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Destination::create($validated);

        return redirect('/destinations');
    }

    public function edit(Destination $destination)
    {
        $countries = Country::all();

        return view('destinations.edit', [
            'destination' => $destination,
            'countries' => $countries,
        ]);
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required',
            'country_id' => 'nullable|exists:countries,id',
            'description' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $destination->update($validated);

        return redirect('/destinations');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect('/destinations');
    }
}