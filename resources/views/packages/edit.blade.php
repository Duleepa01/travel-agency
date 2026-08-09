@extends('layouts.app')

@section('title', 'Edit Package')

@section('content')

<h1>Edit Package</h1>

<form action="{{ route('packages.update', $package->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Package Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $package->name) }}" required>
        @error('name')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <br>

    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ old('description', $package->description) }}</textarea>
        @error('description')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <br>

    <div>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="{{ old('price', $package->price) }}" step="0.01" min="0" required>
        @error('price')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <br>

    <div>
        <label for="duration_days">Duration (Days):</label>
        <input type="number" name="duration_days" id="duration_days" value="{{ old('duration_days', $package->duration_days) }}" min="0" required>
        @error('duration_days')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <br>

    <div>
        <label for="duration_nights">Duration (Nights):</label>
        <input type="number" name="duration_nights" id="duration_nights" value="{{ old('duration_nights', $package->duration_nights) }}" min="0" required>
        @error('duration_nights')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <br>

    <div>
        <label for="max_capacity">Max Capacity:</label>
        <input type="number" name="max_capacity" id="max_capacity" value="{{ old('max_capacity', $package->max_capacity) }}" min="1" required>
        @error('max_capacity')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <br>

    <div>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="draft" {{ old('status', $package->status) == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $package->status) == 'published' ? 'selected' : '' }}>Published</option>
            <option value="inactive" {{ old('status', $package->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <br>

    <div>
        <label for="destinations">Destinations:</label>
        <select name="destinations[]" id="destinations" multiple>
            @foreach ($destinations as $destination)
            <option value="{{ $destination->id }}"
                {{ in_array($destination->id, old('destinations', $package->destinations->pluck('id')->toArray())) ? 'selected' : '' }}>
                {{ $destination->name }}
            </option>
            @endforeach
        </select>
        @error('destinations')
        <div style="color: red">{{ $message }}</div>
        @enderror
        @error('destinations.*')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <br>

    <button type="submit">Update Package</button>

</form>

@endsection