<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', [
            'customers' => $customers
        ]);
    }

    public function create()
    {
        $countries = Country::all();

        return view('customers.create', [
            'countries' => $countries,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'nationality_country_id' => 'nullable|exists:countries,id',
            'residence_country_id' => 'nullable|exists:countries,id',
        ]);

        Customer::create($validated);

        return redirect('/customers');
    }

    public function edit(Customer $customer)
    {
        $countries = Country::all();

        return view('customers.edit', [
            'customer' => $customer,
            'countries' => $countries,
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'nationality_country_id' => 'nullable|exists:countries,id',
            'residence_country_id' => 'nullable|exists:countries,id',
        ]);

        $customer->update($validated);

        return redirect('/customers');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('/customers');
    }
}
