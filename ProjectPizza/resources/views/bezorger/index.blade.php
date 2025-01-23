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

    <!-- Logout Button -->
    <div class="p-5 flex justify-end">
        <form class="LogoutKnop" method="POST" action="{{ route('logout') }}">
            @csrf
            <button :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                class="px-4 py-2 text-white font-semibold rounded shadow">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>

    <!-- Orders Section -->
    <div class="bg-black bg-opacity-70 overflow-hidden shadow-lg rounded-lg w-3/4 mx-auto mt-5 p-5 text-white">
        <h1 class="text-2xl font-bold mb-5 text-yellow-300">Actieve Bestellingen</h1>

        @forelse ($orders as $order)
            @if($order->status == 'Klaar voor ophalen' || $order->status == 'Onderweg')
                <div class="mb-6 p-4 border border-gray-600 rounded">
                    <h2 class="text-lg font-semibold">Order ID: {{ $order->id }}</h2>
                    <h3 class="text-sm mb-4">Order Status: <span class="text-yellow-300">{{ $order->status }}</span></h3>

                    <form method="POST" action="{{ route('bezorger.update', ['order' => $order->id]) }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <label for="status" class="block font-semibold">Wijzig Status:</label>
                        <select name="status" id="status" class="p-2 rounded bg-gray-800 text-yellow-300 w-full mb-4">
                            <option value="Onderweg">Onderweg</option>
                            <option value="Afgeleverd">Afgeleverd</option>
                        </select>

                        <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow w-full">
                            Bevestigen
                        </button>
                    </form>
                </div>
            @endif
        @empty
            <div class="text-center">
                <h2 class="text-lg font-semibold text-gray-400">Geen actieve bestellingen</h2>
            </div>
        @endforelse
    </div>
</body>

</html>