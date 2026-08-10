@extends('layouts.app')

@section('title', 'New Booking')

@section('content')
    <h1>New Booking</h1>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <div>
            <label for="customer_id">Customer:</label>
            <select name="customer_id" id="customer_id">
                <option value="">-- Select --</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                        {{ $customer->first_name }} {{ $customer->last_name }}
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="package_id">Package:</label>
            <select name="package_id" id="package_id" onchange="fillPrice()">
                <option value="">-- Select --</option>
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}" data-price="{{ $package->price }}"
                        {{ old('package_id') == $package->id ? 'selected' : '' }}>
                        {{ $package->name }}
                    </option>
                @endforeach
            </select>
            @error('package_id')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="unit_price">Unit Price:</label>
            <input type="number" id="unit_price" step="0.01" readonly value="{{ old('package_id') ? $packages->find(old('package_id'))->price : '' }}">
        </div>

        <div>
            <label for="travel_date">Travel Date:</label>
            <input type="date" name="travel_date" id="travel_date" value="{{ old('travel_date') }}" required>
            @error('travel_date')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="number_of_travelers">Number of Travelers:</label>
            <input type="number" name="number_of_travelers" id="number_of_travelers" min="1"
                value="{{ old('number_of_travelers', 1) }}" required>
            @error('number_of_travelers')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('status')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Create Booking</button>
    </form>

    <script>
        function fillPrice() {
            const select = document.getElementById('package_id');
            const selectedOption = select.options[select.selectedIndex];
            const price = selectedOption.getAttribute('data-price') || '';
            document.getElementById('unit_price').value = price;
        }
    </script>
@endsection