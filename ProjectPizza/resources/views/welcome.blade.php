<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stonks Pizzaria - Login</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-cover bg-center h-screen w-full" style="background-image: url('/achtergrond/PizzaBackground.jpg');">
    <header class="w-full max-w-md bg-gray-800 bg-opacity-70 text-white rounded-lg shadow-md p-6 text-center">
        <h1 class="text-2xl font-bold">Stonks Pizzaria</h1>
        <nav class="mt-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="block w-full bg-black text-white py-2 rounded-md hover:bg-yellow-400 hover:text-black transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="block w-full bg-black text-white py-2 rounded-md mt-2 hover:bg-yellow-400 hover:text-black transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="block w-full bg-black text-white py-2 rounded-md mt-2 hover:bg-yellow-400 hover:text-black transition">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>
    
</body>

</html>