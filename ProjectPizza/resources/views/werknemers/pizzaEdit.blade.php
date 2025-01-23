<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Aanpassen</title>
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
                                href="{{route('werknemers.showPizzas')}}">Pizza's Bekijken</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{route('werknemers.ingredientenIndex')}}">Ingredienten Bekijken</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{route('werknemers.createIngredienten')}}">Ingredienten Toevoegen</a></button></li>
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
        <form>
            @csrf
            <label for="naam">Naam</label>
            <input class=" text-black " type="text" name="naam" id="naam" value="{{$pizza->naam}}" required>

            <label for="beschrijving">Beschrijving</label>
            <input class=" text-black " type="text" name="beschrijving" id="beschrijving" required>

            <label for="prijs">Prijs</label>
            <input class=" text-black " type="number" name="prijs" id="prijs" required>

            <label for="afbeelding">Afbeelding</label>
            <input type="file" name="afbeelding" id="afbeelding" accept="public/image/*" required>

        </form>
    </div>
</body>

</html>