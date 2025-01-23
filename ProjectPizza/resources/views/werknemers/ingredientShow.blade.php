<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredienten</title>
    @vite('resources/css/index.css')
    @vite('resources/css/app.css')
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
                                href="{{route('werknemers.showPizzas')}}">Pizza's Bekijken</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{ route('medewerker.index') }}">Terug naar overzicht</a></button></li>
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


    <div>
        @foreach ($ingredienten as $ingredient)
        <h1>
            {{$ingredient->naam}}
        </h1>
        <h2>
            {{$ingredient->verkoopPrijs}}
        </h2>
        <div class="flex gap-2 justify-center mt-4">
                        <!-- Edit Button -->
                        <form action="{{ route('werknemers.pizzaEdit', $ingredient->id) }}" method="GET">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow">
                                ✏️ Edit
                            </button>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('pizza.destroy', $ingredient->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded shadow">
                                ❌  Delete
                            </button>
                        </form>
                    </div>
        @endforeach
    </div>
</body>

</html>