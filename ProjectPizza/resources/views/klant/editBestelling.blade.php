<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanpassen</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center text-gray-100"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/images/abstractPopArtBG.avif');">
    <div class="p-4">
        <a class="text-2xl" href="{{ url('/menu') }}">Terug</a>
    </div>

    <div class="mx-auto p-5 w-2/4 rounded-lg" style="background-color: #e4e6d4;">
        <img class="w-64 h-64 object-cover mx-auto rounded mb-6"
            src="{{ asset('images/' . $winkelmandje->product->imagePath) }}" alt="{{ $winkelmandje->product->naam }}">
        <h1 class="text-5xl font-bold text-yellow-400 text-center mb-4">{{ $winkelmandje->product->naam }}</h1>
        <p class="text-center text-3xl mb-2">{{ $winkelmandje->product->beschrijving }}</p>
        <p class="text-center text-3xl font-semibold text-yellow-300 mb-6">€{{ $winkelmandje->product->totaalPrijs }}
        </p>

        <form method="POST" action="{{ route('winkelmandje.update', $winkelmandje->id) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="quantity" class="block text-yellow-400 text-2xl mb-2">Aantal:</label>
                <input type="number" id="quantity" name="quantity" class="p-2 rounded w-full bg-gray-700 text-white"
                    value="{{ old('quantity', $winkelmandje->quantity) }}" min="1" required>
            </div>
            <div>
                <label for="grootte" class="block text-yellow-400 text-2xl mb-2">Grootte:</label>
                <select id="grootte" name="grootte" class="p-2 rounded w-full bg-gray-700 text-white" required>
                    @foreach ($pizzaSizes as $size)
                        <option value="{{ $size->id }}" {{ $winkelmandje->grootte_id == $size->id ? 'selected' : '' }}>
                            {{ $size->afmeting }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="submitKnop w-full bg-yellow-400 border-black border-2 text-white py-2 px-4 rounded hover:bg-yellow-500">Opslaan</button>
        </form>

        <div class="flex justify-between mt-8">
            <div class="w-1/2 pr-2">
                <h2 class="text-xl font-bold text-yellow-400 mb-4">Extra Ingrediënten</h2>
                <div class="space-y-2">
                    @foreach ($ingredients as $item)
                        @if ($item->id != 1)
                            <div class="flex justify-between items-center bg-gray-700 p-2 rounded">
                                <p>{{ $item->naam }}</p>
                                <form action="{{ route('winkelmandje.toevoegen') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="winkelmandje_id" value="{{ $winkelmandje->id }}">
                                    <input type="hidden" name="ingredient_id" value="{{ $item->id }}">
                                    <button type="submit" class="text-green-400 hover:underline">Toevoegen</button>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="w-1/2 pl-2">
                <h2 class="text-xl font-semibold text-yellow-400 mb-4">Extra Gekozen Ingrediënten</h2>
                <div class="space-y-2">
                    @foreach ($extraGekozenIngredienten as $gekozenItem)
                        <div class="flex justify-between items-center bg-gray-700 p-2 rounded">
                            <p>{{ $gekozenItem->ingredient->naam }}</p>
                            <form
                                action="{{ route('winkelmandje.verwijderen', ['winkelmandje' => $gekozenItem->winkelmandje_id, 'ingredient' => $gekozenItem->ingredient->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline">Verwijderen</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>