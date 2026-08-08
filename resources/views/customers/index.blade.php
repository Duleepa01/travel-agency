@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <h1>Customer List</h1>
    <a href="/customers/create">+ Add Customer</a>
    <ul>
        @foreach ($customers as $customer)
            <li>
                {{ $customer->first_name }} {{ $customer->last_name }} - {{ $customer->email }}
                <a href="/customers/{{ $customer->id }}/edit">Edit</a>
                <form action="/customers/{{ $customer->id }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this customer?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection