<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Werker Toevoegen</title>
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
        <h1 class="text-2xl font-bold mb-5 text-yellow-300">Werker Toevoegen</h1>

        <form action="{{ route('manager.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-semibold">Naam:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="text" name="name" id="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email" class="block font-semibold">Email:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="email" name="email" id="email"
                    value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="woonplaats" class="block font-semibold">Woonplaats:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="text" name="woonplaats" id="woonplaats"
                    value="{{ old('woonplaats') }}" required>
                @error('woonplaats')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="adres" class="block font-semibold">Adres:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="text" name="adres" id="adres"
                    value="{{ old('adres') }}" required>
                @error('adres')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="telefoonnummer" class="block font-semibold">Telefoonnummer:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="text" name="telefoonnummer"
                    id="telefoonnummer" value="{{ old('telefoonnummer') }}" required>
                @error('telefoonnummer')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" class="block font-semibold">Wachtwoord:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="password" name="password" id="password"
                    required>
                @error('password')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block font-semibold">Bevestig Wachtwoord:</label>
                <input class="w-full p-2 rounded bg-white text-black" type="password" name="password_confirmation"
                    id="password_confirmation" required>
                @error('password_confirmation')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="role" class="block font-semibold">Rol:</label>
                <select name="role" id="role" class="w-full p-2 rounded bg-white text-black">
                    <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                    <option value="werker" {{ old('role') == 'werker' ? 'selected' : '' }}>Werker</option>
                    <option value="bezorger" {{ old('role') == 'bezorger' ? 'selected' : '' }}>Bezorger</option>
                </select>
                @error('role')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
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