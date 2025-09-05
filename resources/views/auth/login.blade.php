<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Travel Blog Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('destination.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('destination.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-bg text-text flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-4xl bg-card rounded-2xl shadow-xl overflow-hidden grid md:grid-cols-2">

        <!-- Left Side -->
        <div class="hidden md:flex flex-col items-center justify-center bg-primary p-10 text-white">
            <img src="{{ asset('destination.png') }}" alt="Logo" class="w-20 h-20 mb-6 drop-shadow-lg">
            <h1 class="text-3xl font-bold mb-3 text-center">Travel Blog Admin</h1>
            <button id="theme-toggle" class="p-2 rounded-lg text-text transition-colors">
                <svg id="moon-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                    </path>
                </svg>
                <svg id="sun-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
            </button>
            <p class="mt-4 text-center">Manage your travel blog.</p>
        </div>

        <!-- Right Side (Login Form) -->
        <div class="flex flex-col justify-center p-8 md:p-10 rounded-r-2xl">
            <h2 class="text-3xl md:text-4xl font-extrabold mb-6 text-center text-primary">
                Login
            </h2>

            @if (!session('success') && !$errors->any())
                <div class="mb-4 p-4 rounded-lg text-center border"
                    style="background-color: #fff4e5; color: #ff8c42; border-color: #ffc987;">
                    Welcome back! Please log in to continue.
                </div>
            @endif

            @if ($message = session('success'))
                <div class="mb-4 p-4 rounded-lg text-center border"
                    style="background-color: #e6ffed; color: #2f855a; border-color: #9ae6b4;">
                    {{ $message }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-4 rounded-lg border"
                    style="background-color: #ffe5e5; color: #c53030; border-color: #fc8181;">
                    <ul class="list-disc list-inside text-left">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1 text-secondary">Email</label>
                    <input name="email" type="email" value="" class="w-full px-4 py-2.5 text-black"
                        placeholder="your@email.com" />
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1 text-secondary">Password</label>
                    <input name="password" type="password" class="w-full px-4 py-2.5 text-black"
                        placeholder="••••••••" />
                </div>

                <button type="submit" style="background-color: var(--color-primary); color: var(--color-card);"
                    class="w-full font-semibold py-2.5 rounded-lg shadow-md 
                           hover:shadow-lg transform active:scale-95 transition duration-150"
                    onmouseover="this.style.backgroundColor='var(--color-primary-hover)'"
                    onmouseout="this.style.backgroundColor='var(--color-primary)'">
                    Log In
                </button>
            </form>
        </div>
    </div>
</body>

</html>
