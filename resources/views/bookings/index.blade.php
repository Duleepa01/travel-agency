@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
    <h1>Bookings</h1>
    <a href="{{ route('bookings.create') }}" class="button-link primary">+ New Booking</a>
    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Package</th>
                <th>Travel Date</th>
                <th>Travelers</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</td>
                    <td>{{ $booking->package->name }}</td>
                    <td>{{ $booking->travel_date }}</td>
                    <td>{{ $booking->number_of_travelers }}</td>
                    <td>{{ number_format($booking->total_price, 2) }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this booking?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection