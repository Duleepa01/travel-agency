@extends('layouts.app')

@section('title', 'Packages')

@section('content')
    <h1>Packages</h1>
    <a href="{{ route('packages.create') }}">+ Add Package</a>
    <ul>
        @foreach($packages as $package)
            <li>
                {{ $package->name }} - {{ $package->price }} - {{ $package->status }}
                <a href="{{ route('packages.edit', $package->id) }}">Edit</a>
                <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this package?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection