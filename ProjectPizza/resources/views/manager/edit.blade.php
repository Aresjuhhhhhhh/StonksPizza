<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Werker</title>
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
        <h1 class="text-2xl font-bold mb-5 text-yellow-300">Edit Werker</h1>

        <form action="{{ route('manager.update', $werker->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-semibold">Naam:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="text" value="{{ $werker->name }}"
                    name="name" id="name" required>
            </div>

            <div>
                <label for="email" class="block font-semibold">Email:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="email" value="{{ $werker->email }}"
                    name="email" id="email" required>
            </div>

            <div>
                <label for="woonplaats" class="block font-semibold">Woonplaats:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="text" value="{{ $werker->woonplaats }}"
                    name="woonplaats" id="woonplaats" required>
            </div>

            <div>
                <label for="adres" class="block font-semibold">Adres:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="text" value="{{ $werker->adres }}"
                    name="adres" id="adres" required>
            </div>

            <div>
                <label for="telefoonnummer" class="block font-semibold">Telefoonnummer:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="text" value="{{ $werker->telefoonnummer }}"
                    name="telefoonnummer" id="telefoonnummer" required>
            </div>

            <div>
                <label for="role" class="block font-semibold">Rol:</label>
                <select name="role" id="role" class="w-full p-2 rounded bg-white text-black">
                    <option value="manager" {{ old('role', $werker->Rol) == 'manager' ? 'selected' : '' }}>Manager
                    </option>
                    <option value="werker" {{ old('role', $werker->Rol) == 'werker' ? 'selected' : '' }}>Werker</option>
                    <option value="bezorger" {{ old('role', $werker->Rol) == 'bezorger' ? 'selected' : '' }}>Bezorger
                    </option>
                </select>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit" class="px-4 py-2 bg-yellow-300 text-black rounded hover:bg-yellow-400 transition">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</body>

</html>