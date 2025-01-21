<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanpasen</title>
    @vite('resources/css/app.css')
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">
    <div>
        <a class="p-3 text-3xl" href="{{ url('/menu') }}">Terug</a>
    </div>

    <div>
        <img class="pizzaImg mb-6 mx-auto" src="{{ asset('images/' . $winkelmandje->product->imagePath) }}"
            alt="{{ $winkelmandje->product->naam }}">
        <h1 class="text-4xl font-bold text-yellow-400 mb-4">{{ $winkelmandje->product->naam }}</h1>
        <p class="text-gray-200 mb-2">{{ $winkelmandje->product->beschrijving }}</p>
        <p class="text-4xl font-semibold text-yellow-300 mb-6">€{{ $winkelmandje->product->totaalPrijs }}</p>
        <!-- Size and Quantity Form -->
        <form method="POST" action="{{ route('winkelmandje.update', $winkelmandje->id) }}">
            @csrf
            @method('PUT')
            <!-- Quantity -->
            <div class="mb-4">
                <label for="quantity" class="block text-yellow-400 text-xl mb-2">Aantal:</label>
                <input type="number" id="quantity" name="quantity" class="p-2 rounded w-full"
                    value="{{ old('quantity', $winkelmandje->quantity) }}" min="1" required>
            </div>
            <!-- Size -->
            <div class="mb-4">
                <label for="grootte" class="block text-yellow-400 text-xl mb-2">Grootte:</label>
                <select id="grootte" name="grootte" class="p-2 rounded w-full" required>
                    @foreach ($pizzaSizes as $size)
                        <option value="{{ $size->id }}" {{ $winkelmandje->grootte_id == $size->id ? 'selected' : '' }}>
                            {{ $size->naam }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-yellow-400 text-black py-2 px-4 rounded">Opslaan</button>
        </form>
        <div>
            <h1>Extra gekozen ingrediënten</h1>
            @foreach ($extraGekozenIngredienten as $gekozenItem)
                <p>
                    {{ $gekozenItem->ingredient->naam }}
                <form
                    action="{{ route('winkelmandje.verwijderen', ['winkelmandje' => $gekozenItem->winkelmandje_id, 'ingredient' => $gekozenItem->ingredient->id]) }}"
                    method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijderen</button>
                </form>
                </p>
            @endforeach
        </div>
        <div>
            <h1>Extra Ingredienten</h1>
            @foreach ($ingredients as $item)
                @if ($item->id != 1)
                    <p>
                        {{ $item->naam }}
                    <form action="{{ route('winkelmandje.toevoegen') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="winkelmandje_id" value="{{ $winkelmandje->id }}">
                        <input type="hidden" name="ingredient_id" value="{{ $item->id }}">
                        <button type="submit">Toevoegen</button>
                    </form>
                    </p>
                @endif
            @endforeach
        </div>
</body>

</html>