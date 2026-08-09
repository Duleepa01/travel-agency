@extends('layouts.app')

@section('title', 'Edit Destination')

@section('content')
    <h1>Edit Destination</h1>

    <form action="{{ route('destinations.update', $destination->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $destination->name) }}" required>
            @error('name')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="country_id">Country:</label>
            <select name="country_id" id="country_id">
                <option value="">-- Select --</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}"
                        {{ old('country_id', $destination->country_id) == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
            @error('country_id')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ old('description', $destination->description) }}</textarea>
            @error('description')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $destination->is_active) ? 'checked' : '' }}>
                Active
            </label>
        </div>

        <button type="submit">Update Destination</button>
    </form>
@endsection