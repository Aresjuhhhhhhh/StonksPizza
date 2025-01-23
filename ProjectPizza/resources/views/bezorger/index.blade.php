<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezorger</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">
    <form class="LogoutKnop" method="POST" action="{{ route('logout') }}">
        @csrf
        <button :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
        </button>
    </form>

    <div>
        <h1>Actieve Bestellingen</h1>

        @foreach ($orders as $order)
            @if($order->status == 'Klaar voor ophalen' || $order->status == 'Onderweg')
                <h1>Order ID: {{ $order->id }}</h1>
                <h1>Order Status: {{ $order->status }}</h1>
                <form method="POST" action="{{ route('bezorger.update', ['order' => $order->id]) }}">
                    @csrf
                    @method('PUT')
                    <select name="status" class="p-2 rounded bg-gray-800 text-yellow-300 w-full mb-4">
                        <option value="Onderweg">Onderweg</option>
                        <option value="Afgeleverd">Afgeleverd</option>
                    </select>
                    <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow w-full">
                        Bevestigen
                    </button>
                </form>
            @else
                <h1>Geen actieve bestellingen</h1>
            @endif
        @endforeach
    </div>
</body>

</html>