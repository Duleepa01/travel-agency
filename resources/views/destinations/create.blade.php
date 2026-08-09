@extends('layouts.app')

@section('title', 'Add Destination')

@section('content')
    <h1>Add Destination</h1>

    <form action="{{ route('destinations.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="country_id">Country:</label>
            <select name="country_id" id="country_id">
                <option value="">-- Select --</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
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
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                Active
            </label>
        </div>

        <button type="submit">Add Destination</button>
    </form>
@endsection