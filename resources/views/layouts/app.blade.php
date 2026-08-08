<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Travel Agency')</title>
</head>
<body>
    <nav>
        <a href="/customers">Customers</a>
        <a href="/packages">Packages</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>