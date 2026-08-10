@extends('layouts.app')

@section('title', 'Packages')

@section('content')
    <h1>Packages</h1>
    <a href="{{ route('packages.create') }}" class="button-link primary">+ Add Package</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td>{{ $package->name }}</td>
                    <td>{{ number_format($package->price, 2) }}</td>
                    <td>{{ $package->duration_days }}D / {{ $package->duration_nights }}N</td>
                    <td>{{ ucfirst($package->status) }}</td>
                    <td>
                        <a href="{{ route('packages.edit', $package->id) }}">Edit</a>
                        <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this package?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection