<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelling bekijken</title>
    @vite('resources/css/app.css')
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">
    <div>
        <a href="{{ route('medewerker.index') }}">Terug naar overzicht</a>
    </div>



    <div>
        <h1>Order id: {{$order->id}}</h1>
        <h1>Tijd Besteld: {{$formattedDate}}</h1>
        <h1>Totaal: {{$order->totaal_prijs}}</h1>
        <h1>Status: {{$order->status}}</h1>
        <h2>Bestelde Items:</h2>
        @foreach ($orderItems as $orderItem)
            <div>
                <p>Product: {{$orderItem->product->naam}}</p>
                <p>Grootte: {{$orderItem->grootte->afmeting}}</p>

                <h3>Ingrediënten:</h3>
                <ul>
                    @foreach ($orderItem->ingredients as $ingredient)
                        <li>{{$ingredient->naam}}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>


    <div>
        <h1>Order status aanpassen</h1>
        @if($order->bestelmethode == 'afhalen')
            <form method="POST" action="{{ route('werknemers.update', ['order' => $order->id]) }}">
                @csrf
                @method('PUT')
                <select name="status">
                    <option value="In behandeling">In behandeling</option>
                    <option value="In de oven">In de oven</option>
                    <option value="Klaar voor ophalen">Klaar voor ophalen</option>
                </select>
                <button>Bevestigen</button>
            </form>
        @elseif($order->bestelmethode == 'bezorgen')
        <form method="POST" action="{{ route('werknemers.update', ['order' => $order->id]) }}">
            @csrf
            @method('PUT')
            <select name="status">
                <option value="In behandeling">In behandeling</option>
                <option value="In de oven">In de oven</option>
                <option value="Klaar voor ophalen">Klaar voor ophalen</option>
                <option value="Onderweg">Onderweg</option>
                <option value="Afgeleverd">Afgeleverd</option>
            </select>
            <button>Bevestigen</button>
        </form>
        @endif
    </div>

    <div>
    @if ($order->status == 'pending' || $order->status == 'In behandeling')
        <form action="{{ route('werknemers.destroy', ['order' => $order->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Weet je zeker dat je deze bestelling wilt verwijderen?')">
                Bestelling Verwijderen
            </button>
        </form>
    @endif
</div>
</body>

</html>