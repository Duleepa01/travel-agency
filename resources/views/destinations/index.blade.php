@extends('layouts.app')

@section('title', 'Destinations')

@section('content')
    <h1>Destinations</h1>
    <a href="{{ route('destinations.create') }}" class="button-link primary">+ Add Destination</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($destinations as $destination)
                <tr>
                    <td>{{ $destination->name }}</td>
                    <td>{{ $destination->country->name ?? '—' }}</td>
                    <td>{{ $destination->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('destinations.edit', $destination->id) }}">Edit</a>
                        <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this destination?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection