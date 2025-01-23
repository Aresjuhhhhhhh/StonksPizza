<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Aanpasen</title>
    @vite('resources/css/app.css')
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">

    <div>
        <a href="{{ route('medewerker.index') }}">Terug naar overzicht</a>
    </div>


    <div>
        <form>
            @csrf
            <label for="naam">Naam</label>
            <input class=" text-black " type="text" name="naam" id="naam" value="{{$pizza->naam}}" required>

            <label for="beschrijving">Beschrijving</label>
            <input class=" text-black " type="text" name="beschrijving" id="beschrijving" required>

            <label for="prijs">Prijs</label>
            <input class=" text-black " type="number" name="prijs" id="prijs" required>

            <label for="afbeelding">Afbeelding</label>
            <input type="file" name="afbeelding" id="afbeelding" accept="public/image/*" required>

        </form>
    </div>
</body>

</html>