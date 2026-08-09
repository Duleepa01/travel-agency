<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Destination;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();

        return view('packages.index', [
            'packages' => $packages
        ]);
    }

    public function create()
    {
        $destination = Destination::all();

        return view('packages.create', [
            'destinations' => $destination
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:0',
            'duration_nights' => 'required|integer|min:0',
            'max_capacity' => 'required|integer|min:1',
            'status' => 'required|in:draft,published,inactive',
            'destinations' => 'nullable|array',
            'destinations.*' => 'exists:destinations,id',
        ]);

        $package = Package::create($validated);

        $package->destinations()->sync($validated['destinations'] ?? []);

        return redirect()->route('packages.index');
    }

    public function edit(Package $package)
    {
        $destination = Destination::all();

        return view('packages.edit', [
            'package' => $package,
            'destinations' => $destination
        ]);
    }

    public function update(Request $request, Package $package) {
        
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:0',
            'duration_nights' => 'required|integer|min:0',
            'max_capacity' => 'required|integer|min:1',
            'status' => 'required|in:draft,published,inactive',
            'destinations' => 'nullable|array',
            'destinations.*' => 'exists:destinations,id',
        ]);

        $package->update($validated);

        $package->destinations()->sync($validated['destinations'] ?? []);

        return redirect()->route('packages.index');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect('/packages');
    }
}
