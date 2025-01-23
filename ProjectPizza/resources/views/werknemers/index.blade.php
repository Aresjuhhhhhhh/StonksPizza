<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medewerker</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
</head>
<script>
    window.onload = function () {
        const successMessage = document.getElementById('message');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 2000);
        }
    };
</script>

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

    @if(session('message'))
        <div id="message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <h1 class="text-5xl text-center font-bold m-8">Actieve Bestellingen</h1>
    @if($orders->isEmpty())
        <div class="m-8 w-full max-w-72 bg-black bg-opacity-70 shadow-lg rounded-lg p-6">
            <h1 class="text-center text-lg font-medium text-white">Geen actieve bestellingen</h1>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 m-8">
        @foreach ($orders as $order)
            <div class="bg-black bg-opacity-70 shadow-lg rounded-lg p-6">
                <h1 class="text-lg font-semibold text-white">Order id: {{$order->id}}</h1>
                <p class="text-white">Tijd Besteld: {{$order->formattedDatum}}</p>
                <p class="text-white">Totaal: {{$order->totaal_prijs}}</p>
                <p class="text-white">Status: {{$order->status}}</p>
                <p class="text-white">Bestelmethode: {{$order->bestelmethode}}</p>
                <a href="{{ route('werknemers.show', ['order' => $order->id]) }}"
                    class="text-yellow-300 hover:text-yellow-400 underline">Bekijken</a>
            </div>
        @endforeach
    </div>
</body>

</html>