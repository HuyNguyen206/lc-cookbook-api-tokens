<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-800 text-gray-300">
    <nav class="px-4 py-4 space-x-6 border-b border-gray-500">
        <a href="/" class="hover:text-gray-200">Home</a>
        @auth
            <a href="/my-repos" class="hover:text-gray-200">My Repos</a>
            <a href="/repos/create" class="hover:text-gray-200">Create Repo</a>
            <a href="{{route('create-access-token')}}" class="hover:text-gray-200">Create personal access token</a>
        @endauth
        @guest
            <a href="{{ route('login') }}">Log in</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest

        @auth
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Logout
                </a>
            </form>
        @endauth


    </nav>
    <div>
        {{ $slot }}
    </div>
</body>

</html>
