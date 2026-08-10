@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
<p class="page-intro">Overview of your agency's current data.</p>

<div class="stats">
    <div class="stat-card">
        <span class="stat-number">{{ $customerCount }}</span>
        <span class="stat-label">Customers</span>
    </div>
    <div class="stat-card">
        <span class="stat-number">{{ $packageCount }}</span>
        <span class="stat-label">Packages</span>
    </div>
    <div class="stat-card">
        <span class="stat-number">{{ $destinationCount }}</span>
        <span class="stat-label">Destinations</span>
    </div>
    <div class="stat-card">
        <span class="stat-number">{{ $bookingCount }}</span>
        <span class="stat-label">Bookings</span>
    </div>
</div>
@endsection