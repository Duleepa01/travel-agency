@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <h1>Customer List</h1>
    <a href="{{ route('customers.create') }}" class="button-link primary">+ Add Customer</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Nationality</th>
                <th>Residence</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->nationality->name ?? '—' }}</td>
                    <td>{{ $customer->residence->name ?? '—' }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this customer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection