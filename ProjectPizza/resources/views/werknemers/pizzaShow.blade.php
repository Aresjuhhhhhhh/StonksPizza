<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza's Bekijken</title>
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
                                href="{{route('werknemers.pizzaToevoegen')}}">Pizza
                                Toevoegen</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{ route('medewerker.index') }}">Terug naar overzicht</a></button></li>
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

    <main class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($pizzas as $pizza)
                <div class="bg-black bg-opacity-70 p-6 rounded-lg shadow-lg">
                    <h1 class="text-3xl font-bold text-yellow-300">{{$pizza->naam}}</h1>
                    <p class="text-gray-300 text-3xl mb-4">{{$pizza->beschrijving}}</p>
                    <h2 class="text-2xl font-semibold text-white">Prijs: {{$pizza->totaalPrijs}}</h2>
                    <img src="{{ asset('images/' . $pizza->imagePath) }}" alt="pizza" class="w-full h-auto rounded mt-4">
                    <div class="flex gap-2 justify-center mt-4">
                        <!-- Edit Button -->
                        <form action="{{ route('werknemers.pizzaEdit', $pizza->id) }}" method="GET">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow">
                                ✏️ Edit
                            </button>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('pizza.destroy', $pizza->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded shadow">
                                ❌  Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

</body>

</html>