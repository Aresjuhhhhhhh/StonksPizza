<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Toevoegen</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">

    <div class="header-container2">
        <header>
            <nav>
                <ul class="nav-list">
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{ route('medewerker.index') }}">Terug naar overzicht</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{route('werknemers.showPizzas')}}">Pizza's Bekijken</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{route('werknemers.ingredientenIndex')}}">Ingredienten Bekijken</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{route('werknemers.createIngredienten')}}">Ingredienten Toevoegen</a></button>
                    </li>
                    <li>
                        <form class="LogoutKnop" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <main class="flex flex-col items-center bg-black bg-opacity-70 shadow-lg rounded-lg p-6 m-8">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-yellow-300">Pizza Toevoegen</h1>
        </div>

        <form method="POST" action="{{ route('werknemers.pizzaToevoegen') }}" enctype="multipart/form-data"
            class="w-full max-w-lg">
            @csrf
            <div class="mb-4">
                <label for="naam" class="block text-gray-200 font-medium mb-2">Naam</label>
                <input
                    class="w-full px-4 py-2 rounded bg-gray-800 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    type="text" name="naam" id="naam" required>
            </div>

            <div class="mb-4">
                <label for="beschrijving" class="block text-gray-200 font-medium mb-2">Beschrijving</label>
                <textarea
                    class="w-full px-4 py-2 rounded bg-gray-800 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    name="beschrijving" id="beschrijving" rows="3" required></textarea>
            </div>

            <div class="mb-4">
                <label for="prijs" class="block text-gray-200 font-medium mb-2">Prijs</label>
                <input
                    class="w-full px-4 py-2 rounded bg-gray-800 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    type="number" name="prijs" id="prijs" required>
            </div>

            <div class="mb-4">
                <label for="afbeelding" class="block text-gray-200 font-medium mb-2">Afbeelding</label>
                <input
                    class="w-full px-4 py-2 rounded bg-gray-800 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    type="file" name="afbeelding" id="afbeelding" accept="image/*" required>
            </div>

            <div class="mb-6">
                <p class="text-gray-200 font-medium mb-2">Ingredienten</p>
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($Ingredienten as $ingredient)
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="ingredient-{{ $ingredient->id }}" name="ingredients[]"
                                value="{{ $ingredient->id }}" class="rounded text-yellow-400 focus:ring-yellow-300">
                            <label for="ingredient-{{ $ingredient->id }}"
                                class="text-gray-200">{{ $ingredient->naam }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="px-6 py-2 rounded bg-yellow-400 text-black font-semibold hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                    Toevoegen
                </button>
            </div>
        </form>
    </main>
</body>

</html>