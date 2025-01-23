<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Werker Toevoegen</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">

    <div>
        <a href="{{ route('manager.index') }}" class="text-yellow-300 hover:text-yellow-400 underline">Terug naar
            overzicht</a>
    </div>


    <div>
        <form action="{{ route('manager.store') }}" method="POST">
            @csrf
            <label for="name">Naam:</label>
            <input class="text-black" type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <label for="email">Email:</label>
            <input class="text-black" type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <label for="woonplaats">Woonplaats:</label>
            <input class="text-black" type="text" name="woonplaats" id="woonplaats" value="{{ old('woonplaats') }}"
                required>
            @error('woonplaats')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <label for="adres">Adres:</label>
            <input class="text-black" type="text" name="adres" id="adres" value="{{ old('adres') }}" required>
            @error('adres')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <label for="telefoonnummer">Telefoonnummer:</label>
            <input class="text-black" type="text" name="telefoonnummer" id="telefoonnummer"
                value="{{ old('telefoonnummer') }}" required>
            @error('telefoonnummer')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <label for="password">Wachtwoord:</label>
            <input class="text-black" type="password" name="password" id="password" required>
            @error('password')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <label for="password_confirmation">Bevestig Wachtwoord:</label>
            <input class="text-black" type="password" name="password_confirmation" id="password_confirmation" required>
            @error('password_confirmation')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <label for="role">Rol:</label>
            <select name="role" id="role" class="text-black">
                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="werker" {{ old('role') == 'werker' ? 'selected' : '' }}>Werker</option>
                <option value="bezorger" {{ old('role') == 'bezorger' ? 'selected' : '' }}>Bezorger</option>
            </select>
            @error('role')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <button type="submit" class="text-yellow-300 hover:text-yellow-400 underline">Opslaan</button>
        </form>
    </div>
</body>

</html>