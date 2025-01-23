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
        <form action="{{ route('pizza.pizzaUpdate', $pizza->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="naam">Naam</label>
            <input class=" text-black " type="text" name="naam" id="naam" value="{{$pizza->naam}}" required>

            <label for="beschrijving">Beschrijving</label>
            <input class="text-black" type="text" name="beschrijving" value="{{$pizza->beschrijving}}" id="beschrijving"
                required style="width: fit-content; min-width: 250px;">
            <label for="prijs">Prijs</label>
            <input class=" text-black " type="number" name="prijs" id="prijs" value="{{$pizza->totaalPrijs}}" required>

            <label for="afbeelding">Afbeelding</label>
            <input type="file" name="afbeelding" id="afbeelding" accept="public/image/*">
            <br>
            <button type="submit">Opslaan</button>
        </form>


        <div class="flex justify-between mt-8">
            <div class="w-1/2 pr-2">
                <h2 class="text-xl font-bold text-yellow-400 mb-4">Extra Ingrediënten</h2>
                <div class="space-y-2">
                    @foreach ($ingredienten as $item)
                        @if (!$gekozenIngredienten->contains($item))
                            <div class="flex justify-between items-center bg-gray-700 p-2 rounded">
                                <p>{{ $item->naam }}</p>
                                <form action="{{ route('pizza.ingredientToevoegen', $pizza->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ingredient_id" value="{{ $item->id }}">
                                    <button type="submit" class="text-green-400 hover:underline">Toevoegen</button>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="w-1/2 pl-2">
                <h2 class="text-xl font-semibold text-yellow-400 mb-4">Extra Gekozen Ingrediënten</h2>
                <div class="space-y-2">
                    @foreach ($gekozenIngredienten as $gekozenItem)
                        <div class="flex justify-between items-center bg-gray-700 p-2 rounded">
                            <p>{{ $gekozenItem->naam }}</p>
                            <form
                                action="{{ route('pizza.ingredientVerwijderen', ['pizza' => $pizza->id, 'ingredient' => $gekozenItem->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline">Verwijderen</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>