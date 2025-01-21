<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    @vite('resources/css/app.css')
</head>
<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">

    <div>
        <a href="/Home">Terug</a>
    </div>

    <!--Div 1-->
    <div>
        <h1>Bedankt voor uw bestelling!</h1>
        <p>Uw bestelling is succesvol geplaatst.</p>

        <h1>Totaal: {{$order->totaal_prijs}}</h1>
        <h1>Status: {{$order->status}}</h1>
        <h1>Bestelmethode: {{$order->bestelmethode}}</h1>
        <h1>Besteld op: {{$formattedDate}}</h1>
    </div>

<!--Div 2-->
    @foreach ($orderSummary as $item)
    <div>
        
        <h1>{{$item->product->naam}}</h1>
        <h1>Quantity: {{ $item->quantity }}</h1>
        <p>Size: {{ $item->grootte->afmeting}}</p>

        <p>Extra Ingredients:</p>
            <ul>
                @foreach ($item->ingredients as $ingredient)
                    <li>{{ $ingredient->naam }}</li>
                @endforeach
            </ul>
    </div>
    @endforeach

    <!--Div 3-->

    <div>
        <h1>Delivery Information</h1>
        <p>Address: {{ $userInfo->adres }}</p>
        <p>City: {{ $userInfo->woonplaats }}</p>
    </div>


</body>
</html>