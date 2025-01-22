<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelling gelukt</title>
    @vite('resources/css/app.css')
</head>

<body class="bodyColor min-h-screen flex flex-col items-center bg-gray-900 text-white bg-cover bg-center p-4"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/images/abstractPopArtBG.avif');">
    <div class="w-full text-left mb-6">
        <a href="/Home">Terug</a>
    </div>
    <div class="rounded-lg shadow-md p-6 border-2 border-black max-w-3xl w-full" style="background-color: #e4e6d4;">
        <div class="flex flex-row items-center">
            <div class="flex-1">
                <h1 class="text-2xl font-bold mb-4">Bedankt voor uw bestelling!</h1>
                <p class="mb-4">Uw bestelling is succesvol geplaatst.</p>
                <div class="text-lg mb-4">
                    <p class="text-yellow-300 text-2xl">
                        <span class="font-semibold">Totaal:</span> {{$order->totaal_prijs}}
                    </p>
                    <p class="text-2xl">
                        <span class="font-semibold">Status:</span> {{$order->status}}
                    </p>
                    <p class="text-2xl">
                        <span class="font-semibold">Bestelmethode:</span> {{$order->bestelmethode}}
                    </p>
                    <p class="text-2xl">
                        <span class="font-semibold">Besteld op:</span> {{$formattedDate}}
                    </p>
                </div>
            </div>
            <div class="mt-4">
                <img src="{{ asset('images/WebsiteImage1.png') }}" class="w-full rounded border-2 border-black max-w-xs mx-auto alt='Pizza'">
            </div>
        </div>
    </div>
    <div class="rounded-lg shadow-md border-2 border-black p-6 mt-6 max-w-3xl w-full" style="background-color: #e4e6d4;">
        <h2 class="text-3xl text-yellow-300 font-bold mb-4">Bestelling</h2>
        @foreach ($orderSummary as $item)
            <div class="border-b border-gray-700 pb-4 mb-4">
                <h3 class="text-1xl font-semibold">{{$item->product->naam}}</h3>
                <p>Aantal: {{ $item->quantity }}</p>
                <p>Grootte: {{ $item->grootte->afmeting }}</p>
                <p class="mt-2 text-yellow-300">Extra Ingredienten:</p>
                <ul class="">
                    @foreach ($item->ingredients as $ingredient)
                        <li>{{ $ingredient->naam }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
    <div class="rounded-lg shadow-md border-2 border-black p-6 mt-6 max-w-3xl w-full" style="background-color: #e4e6d4;">
        <h2 class="text-3xl text-yellow-300 font-bold mb-4">Bezorg Informatie</h2>
        <p><span class="font-semibold">Adres:</span> {{ $userInfo->adres }}</p>
        <p><span class="font-semibold">Woonplaats:</span> {{ $userInfo->woonplaats }}</p>
    </div>
</body>

</html>