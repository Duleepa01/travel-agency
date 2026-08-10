<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Travel Agency')</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <header class="site-header">
        <div class="inner">
            <a href="{{ route('dashboard') }}" class="brand">Serendib<span>Travels</span></a>
            <nav class="main-nav">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('customers.index') }}">Customers</a>
                <a href="{{ route('packages.index') }}">Packages</a>
                <a href="{{ route('destinations.index') }}">Destinations</a>
                <a href="{{ route('bookings.index') }}">Bookings</a>
            </nav>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>