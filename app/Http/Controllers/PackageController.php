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

    public function create() {
        $destination = Destination::all();

        return view('packages.create', [
            'destinations' => $destination
        ]);
    }

    public function store(Request $request){

    }

    public function edit(Package $package) {
        $destination = Destination::all();

        return view('packages.edit', [
            'package' => $package,
            'destinations' => $destination
        ]);
    }

    public function update(Request $request, Package $package) {

    }

     public function destroy(Package $package)
    {
        $package->delete();

        return redirect('/packages');
    }

}
