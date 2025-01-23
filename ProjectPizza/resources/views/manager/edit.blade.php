<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Werker</title>
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
        <form action="{{ route('manager.update', $werker->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Naam:</label>
            <input class="text-black" type="text" value="{{$werker->name}}" name="name" id="name" required>
            <label for="email">Email:</label>
            <input class="text-black" type="email" value="{{$werker->email}}" name="email" id="email" required>
            <label for="woonplaats">Woonplaats:</label>
            <input class="text-black" type="text" value="{{$werker->woonplaats}}" name="woonplaats" id="woonplaats"
                required>
            <label for="adres">Adres:</label>
            <input class="text-black" type="text" value="{{$werker->adres}}" name="adres" id="adres" required>
            <label for="telefoonnummer">Telefoonnummer:</label>
            <input class="text-black" type="text" value="{{$werker->telefoonnummer}}" name="telefoonnummer"
                id="telefoonnummer" required>
            <label for="role">Rol:</label>
            <select name="role" id="role" class="text-black">
                <option value="manager" {{ old('role', $user->Rol) == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="werker" {{ old('role', $user->Rol) == 'werker' ? 'selected' : '' }}>Werker</option>
                <option value="bezorger" {{ old('role', $user->Rol) == 'bezorger' ? 'selected' : '' }}>Bezorger</option>
            </select>
            <button type="submit" class="text-yellow-300 hover:text-yellow-400 underline">Opslaan</button>
        </form>
    </div>
</body>

</html>