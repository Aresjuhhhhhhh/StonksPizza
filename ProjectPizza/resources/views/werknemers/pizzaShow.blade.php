<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza's Bekijken</title>
    @vite('resources/css/app.css')
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">


    <div>
        <a href="{{ route('medewerker.index') }}">Terug naar overzicht</a>
    </div>

    @foreach ($pizzas as $pizza)
        <div>
            <h1>{{$pizza->naam}}</h1>
            <h1>{{$pizza->beschrijving}}</h1>
            <h1>{{$pizza->totaalPrijs}}</h1>
            <img src="{{ asset('images/' . $pizza->imagePath) }}" alt="pizza" class="pizza">
            <div class="flex gap-2">
                <!-- Edit Button -->
                <form action="{{ route('werknemers.pizzaEdit', $pizza->id) }}" method="GET">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow">
                        ✏️ Edit
                    </button>
                </form>

                <!-- Delete Button -->
                <form action="{{ route('pizza.destroy', $pizza->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded shadow">
                        ❌ Delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach

</body>

</html>