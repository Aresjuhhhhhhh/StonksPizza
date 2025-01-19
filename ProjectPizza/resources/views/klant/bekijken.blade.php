<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bekijken</title>
    @vite('resources/css/app.css')
    @vite('resources/css/bekijken.css')
</head>

<body class="bodyColor" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif'); 
           background-size: cover; 
           background-repeat: no-repeat; 
           background-attachment: fixed; 
           background-position: center;">

    <div>
        <a href="{{ url('/menu') }}">Back to Menu</a>
    </div>

    <div class="form-container">
        <img class="pizzaImg" src="{{ asset('images/' . $pizza->imagePath) }}" alt="{{ $pizza->naam }}">
        <h1>{{ $pizza->naam }}</h1>
        <p>{{ $pizza->beschrijving }}</p>
        <p>€{{ $pizza->totaalPrijs }}</p>

        <form method="POST" action="{{ route('bekijken.store') }}">
            @csrf
            <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">

            <div id="extra-ingredients" class="extras-container">
                <h1>Extra's</h1>
                @foreach ($Ingredienten as $ingredient)
                    @if ($ingredient->id != 1)
                        <div>
                            <input type="checkbox" id="ingredient-{{ $ingredient->id }}" name="ingredients[]"
                                value="{{ $ingredient->id }}">
                            <label for="ingredient-{{ $ingredient->id }}">{{ $ingredient->naam }}</label>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="Opties-container">
                <h1>Grootte</h1>
                <select id="Grootte" name="Grootte">
                    @foreach ($pizzaGrootte as $grootte)
                        <option value="{{ $grootte->id }}">{{ $grootte->afmeting }}</option>
                    @endforeach
                </select>

                <h1>Aantal</h1>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </div>

            <button type="submit" class="menu-button">Add to Cart</button>
        </form>
    </div>
</body>

</html>