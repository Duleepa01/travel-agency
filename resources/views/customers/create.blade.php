@extends('layouts.app')

@section('title', 'Customer Registration')

@section('content')

<h1>Register New Customer</h1>

<form action="/customers" method="POST">
    @csrf

    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name"
        value="{{ old('first_name') }}" required>
    @error('first_name')
    <div style="color:red">{{ $message }}</div>
    @enderror

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name"
        value="{{ old('last_name') }}" required>
    @error('last_name')
    <div style="color:red">{{ $message }}</div>
    @enderror

    <label for="email">Email:</label>
    <input type="email" name="email" id="email"
        value="{{ old('email') }}" required>
    @error('email')
    <div style="color:red">{{ $message }}</div>
    @enderror

    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone"
        value="{{ old('phone') }}" required>
    @error('phone')
    <div style="color:red">{{ $message }}</div>
    @enderror

    <label for="address">Address:</label>
    <input type="text" name="address" id="address"
        value="{{ old('address') }}" required>
    @error('address')
    <div style="color:red">{{ $message }}</div>
    @enderror
<br>
    <label for="nationality_country_id">Nationality:</label>
    <select name="nationality_country_id" id="nationality_country_id">
        <option value="">-- Select --</option>
        @foreach ($countries as $country)
        <option value="{{ $country->id }}"
            {{ old('nationality_country_id', $customer->nationality_country_id ?? '') == $country->id ? 'selected' : '' }}>
            {{ $country->name }}
        </option>
        @endforeach
    </select>
    @error('nationality_country_id')
    <div style="color:red">{{ $message }}</div>
    @enderror
<br>
<label for="residence_country_id">Country of Residence:</label>
<select name="residence_country_id" id="residence_country_id">
    <option value="">-- Select --</option>
    @foreach ($countries as $country)
    <option value="{{ $country->id }}"
        {{ old('residence_country_id') == $country->id ? 'selected' : '' }}>
        {{ $country->name }}
    </option>
    @endforeach
</select>
@error('residence_country_id')
<div style="color:red">{{ $message }}</div>
@enderror
<br>
    <button type="submit">Register</button>

</form>

@endsection