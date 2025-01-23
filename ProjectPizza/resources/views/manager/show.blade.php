<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Werker</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">
    <div class="p-5">
        <a href="{{ route('manager.index') }}" class="text-yellow-300 hover:text-yellow-400 underline">Terug naar
            overzicht</a>
    </div>

    <div class="bg-black bg-opacity-70 overflow-hidden shadow-lg rounded-lg w-1/2 mx-auto mt-10 p-5 text-white">
        <h1 class="text-2xl font-bold mb-4 text-yellow-300">Werker</h1>
        <h2 class="text-lg mb-2"><span class="font-semibold">Naam:</span> {{$werker->name}}</h2>
        <h2 class="text-lg mb-2"><span class="font-semibold">Email:</span> {{$werker->email}}</h2>
        <h2 class="text-lg mb-2"><span class="font-semibold">Woonplaats:</span> {{$werker->woonplaats}}</h2>
        <h2 class="text-lg mb-2"><span class="font-semibold">Telefoonnummer:</span> {{$werker->telefoonnummer}}</h2>
        <h2 class="text-lg mb-2"><span class="font-semibold">Adres:</span> {{$werker->adres}}</h2>
        <h2 class="text-lg mb-4"><span class="font-semibold">Rol:</span> {{$werker->Rol}}</h2>

        <div class="flex space-x-5">
            <a href="{{ route('manager.edit', ['id' => $werker->id]) }}"
                class="px-4 py-2 bg-yellow-300 text-white rounded hover:bg-yellow-400 transition">
                Bewerken
            </a>

            <form action="{{ route('manager.destroy', ['id' => $werker->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Weet je zeker dat je deze werker wilt annuleren?')"
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                    Verwijderen
                </button>
            </form>
        </div>
    </div>
</body>

</html>