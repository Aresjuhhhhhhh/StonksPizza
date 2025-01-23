<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Toevoegen</title>
    @vite('resources/css/app.css')
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">

    <div>
        <a href="{{ route('medewerker.index') }}">Terug naar overzicht</a>
    </div>

    <div>
        <h1>Pizza Toevoegen</h1>
    </div>

    <div class="m-8" >
        <form method="POST" action="{{ route('werknemers.pizzaToevoegen') }}" enctype="multipart/form-data">
            @csrf
            <label for="naam">Naam</label>
            <input class=" text-black " type="text" name="naam" id="naam" required>

            <label for="beschrijving">Beschrijving</label>
            <input class=" text-black " type="text" name="beschrijving" id="beschrijving" required>

            <label for="prijs">Prijs</label>
            <input class=" text-black " type="number" name="prijs" id="prijs" required>

            <label for="afbeelding">Afbeelding</label>
            <input  type="file" name="afbeelding" id="afbeelding" accept="public/image/*" required>
            <div class="grid ml-32 grid-cols-2 gap-4">
                    @foreach ($Ingredienten as $ingredient)
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="ingredient-{{ $ingredient->id }}" name="ingredients[]"
                                    value="{{ $ingredient->id }}" class="rounded text-yellow-400 focus:ring-yellow-300">
                                <label for="ingredient-{{ $ingredient->id }}"
                                    class="text-gray-200">{{ $ingredient->naam }}</label>
                            </div>
                    @endforeach
                </div>
                <button type="submit">Toevoegen</button>
        </form>
    </div>



</body>

</html>