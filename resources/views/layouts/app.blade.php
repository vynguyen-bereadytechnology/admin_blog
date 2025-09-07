<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('destination.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('destination.png') }}">
    <title>@yield('title', 'Travel Blog')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-bg text-text min-h-screen flex flex-col">

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

</body>

</html>
