<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelling bekijken</title>
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
                                href="{{route('werknemers.pizzaToevoegen')}}">Pizza Toevoegen</a></button></li>
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

    <main class="p-8 space-y-8">
        <div class="text-white text-2xl">
            <a href="{{ route('medewerker.index') }}" class="hover:underline decoration-yellow-400">Terug naar
                overzicht</a>
        </div>

        <div class="bg-black bg-opacity-70 p-6 rounded-lg shadow-lg space-y-4 text-white">
            <h1 class="text-2xl font-bold text-yellow-300">Order Details</h1>
            <p><span class="font-semibold">Order ID:</span> {{$order->id}}</p>
            <p><span class="font-semibold">Tijd Besteld:</span> {{$formattedDate}}</p>
            <p><span class="font-semibold">Totaal:</span> {{$order->totaal_prijs}}</p>
            <p><span class="font-semibold">Status:</span> {{$order->status}}</p>
        </div>

        <div class="bg-black bg-opacity-70 p-6 rounded-lg shadow-lg text-white">
            <h2 class="text-xl font-semibold text-yellow-300">Bestelde Items</h2>
            @foreach ($orderItems as $orderItem)
                <div class="border-b border-gray-600 py-4">
                    <p><span class="font-semibold">Product:</span> {{$orderItem->product->naam}}</p>
                    <p><span class="font-semibold">Grootte:</span> {{$orderItem->grootte->afmeting}}</p>

                    <h3 class="font-semibold mt-2">Ingrediënten:</h3>
                    <ul class="list-disc list-inside text-gray-300">
                        @foreach ($orderItem->ingredients as $ingredient)
                            <li>{{$ingredient->naam}}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="bg-black bg-opacity-70 p-6 rounded-lg shadow-lg text-white">
            <h1 class="text-xl font-bold text-yellow-300 mb-4">Order Status Aanpassen</h1>
            @if($order->bestelmethode == 'afhalen')
                <form method="POST" action="{{ route('werknemers.update', ['order' => $order->id]) }}">
                    @csrf
                    @method('PUT')
                    <select name="status" class="p-2 rounded bg-gray-800 text-yellow-300 w-full mb-4">
                        <option value="In behandeling">In behandeling</option>
                        <option value="In de oven">In de oven</option>
                        <option value="Klaar voor ophalen">Klaar voor ophalen</option>
                    </select>
                    <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow w-full">
                        Bevestigen
                    </button>
                </form>
            @elseif($order->bestelmethode == 'bezorgen')
                <form method="POST" action="{{ route('werknemers.update', ['order' => $order->id]) }}">
                    @csrf
                    @method('PUT')
                    <select name="status" class="p-2 rounded bg-gray-800 text-yellow-300 w-full mb-4">
                        <option value="In behandeling">In behandeling</option>
                        <option value="In de oven">In de oven</option>
                        <option value="Klaar voor ophalen">Klaar voor ophalen</option>
                        <option value="Onderweg">Onderweg</option>
                        <option value="Afgeleverd">Afgeleverd</option>
                    </select>
                    <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow w-full">
                        Bevestigen
                    </button>
                </form>
            @endif
        </div>

        <div>
            @if ($order->status == 'pending' || $order->status == 'In behandeling')
                <form action="{{ route('werknemers.destroy', ['order' => $order->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded shadow w-full"
                        onclick="return confirm('Weet je zeker dat je deze bestelling wilt verwijderen?')">
                        Bestelling Verwijderen
                    </button>
                </form>
            @endif
        </div>
    </main>
</body>

</html>