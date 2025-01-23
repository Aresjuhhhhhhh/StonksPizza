<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bekijken</title>
    @vite('resources/css/app.css')
    @vite('resources/css/bekijken.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
</head>

<body class="bodyColor" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif'); 
           background-size: cover; 
           background-repeat: no-repeat; 
           background-attachment: fixed; 
           background-position: center;">

    <div>
        <a class="p-3 text-3xl" href="{{ url('/menu') }}">Back to Menu</a>
    </div>

    <div class="form-container p-8 ">
        <img class="pizzaImg mb-6 mx-auto" src="{{ asset('images/' . $pizza->imagePath) }}" alt="{{ $pizza->naam }}">
        <h1 class="text-4xl font-bold text-yellow-400 mb-4">{{ $pizza->naam }}</h1>
        <p class="text-gray-200 mb-2">{{ $pizza->beschrijving }}</p>
        <p class="text-4xl font-semibold text-yellow-300 mb-6">€{{ $pizza->totaalPrijs }}</p>

        <form method="POST" action="{{ route('bekijken.store') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">

            <div>
                <h1>Ingredienten</h1>
                <div class="grid grid-cols-2 gap-4 text-yellow-400">
                    @foreach ($pizza->ingredienten as $ingredient)
                        <div>
                            <p>{{ $ingredient->naam }}</p>
                        </div>
                    @endforeach
            </div>
            @auth
            <div id="extra-ingredients" class="extras-container">
                <h1 class="text-xl font-bold text-yellow-400 mb-3">Extra's</h1>
                <div class="grid ml-32 grid-cols-2 gap-4">
                    @foreach ($Ingredienten as $ingredient)
                        @if ($ingredient->id != 1)
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="ingredient-{{ $ingredient->id }}" name="ingredients[]"
                                    value="{{ $ingredient->id }}" class="rounded text-yellow-400 focus:ring-yellow-300">
                                <label for="ingredient-{{ $ingredient->id }}"
                                    class="text-gray-200">{{ $ingredient->naam }}</label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="Opties-container space-y-4">
                <div>
                    <h1 class="text-3xl font-bold text-yellow-400 mb-3">Grootte</h1>
                    <select id="Grootte" name="Grootte"
                        class="w-full rounded-lg border-gray-300 text-gray-800 p-2 focus:ring-2 focus:ring-yellow-300 focus:outline-none">
                        @foreach ($pizzaGrootte as $grootte)
                            <option 
                            @if($grootte->id== 2)
                                selected
                            @endif 
                            value="{{ $grootte->id }}">{{ $grootte->afmeting }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <h1 class="text-3xl font-bold text-yellow-400 mb-3">Aantal</h1>
                    <input type="number" id="quantity" name="quantity" min="1" value="1"
                        class="w-full rounded-lg border-gray-300 text-gray-800 p-2 focus:ring-2 focus:ring-yellow-300 focus:outline-none">
                </div>
            </div>

            <button type="submit"
                class="w-full bg-yellow-400 text-black font-bold py-2 px-4 rounded-lg shadow-lg hover:bg-yellow-500 transition duration-200">
                Add to Cart
            </button>
        </form>
        @endauth
    </div>
</body>
</html>