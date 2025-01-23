<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Werker</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
</head>
<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">
    <div>
        <a href="{{ route('manager.index') }}" class="text-yellow-300 hover:text-yellow-400 underline">Terug naar overzicht</a>
    </div>

    <div>
        <h1>Werker</h1>
        <h2>Naam: {{$werker->name}}</h2>
        <h2>Email: {{$werker->email}}</h2>
        <h2>Woonplaats: {{$werker->woonplaats}}</h2>
        <h2>Telefoonnummer: {{$werker->telefoonnummer}}</h2>
        <h2>Adres: {{$werker->adres}}</h2>
        <h2>Rol: {{$werker->Rol}}</h2>

        <a href="{{ route('manager.edit', ['id' => $werker->id]) }}" class="text-yellow-300 hover:text-yellow-400 underline">Bewerken</a>

        <form action="{{ route('manager.destroy', ['id' => $werker->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Weet je zeker dat je deze werker wilt annuleren?')" class="text-yellow-300 hover:text-yellow-400 underline">Verwijderen</button>
        </form>
    </div>
</body>
</html>