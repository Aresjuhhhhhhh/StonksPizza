<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredient aanpasen</title>
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
                                href="{{route('werknemers.ingredientenIndex')}}">Ingredienten Bekijken</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{ route('medewerker.index') }}">Terug naar overzicht</a></button></li>
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
        <form action="{{ route('werknemers.ingredientEdit', $ingredient->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="ingredient">Ingredient Naam:</label>
            <input class="text-black" type="text" value="{{$ingredient->naam}}" name="ingredient" id="ingredient"
                required>
            <label for="prijs">Prijs:</label>
            <input class="text-black" type="number" value="{{$ingredient->verkoopPrijs}}" step="0.01" name="prijs"
                id="prijs" required>
            <button class="bg-yellow-300 hover:bg-yellow-400 text-black font-bold py-2 px-4 rounded mt-4"
                type="submit">Aanpassen</button>
        </form>
    </div>
</body>

</html>