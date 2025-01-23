<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medewerker</title>
    @vite('resources/css/app.css')
</head>
<script>
            window.onload = function () {
            const successMessage = document.getElementById('message');
            if (successMessage) {
                setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 2000);
            }
        };
</script>
<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">

    <div>
        <a href="{{route('werknemers.pizzaToevoegen')}}">Pizza Toevoegen</a>
    </div>

    <div>
        <a href="{{route('werknemers.showPizzas')}}">Pizza's Bekijken</a>
    </div>




    <div class="m-8" >

    @if(session('message'))
                <div id="message" class="success-message">
                    {{ session('message') }}
                </div>
            @endif
        <h1>Actieve Bestellingen</h1>

        @if($orders->isEmpty())
            <h1>Geen actieve bestellingen</h1>
        @endif
        @foreach ($orders as $order)
            <div>
                <h1>Order id: {{$order->id}}</h1>
                <h1>Tijd Besteld: {{$order->formattedDatum}}</h1>
                <h1>Totaal: {{$order->totaal_prijs}}</h1>
                <h1>Status: {{$order->status}}</h1>
                <h1>Bestelmethode: {{$order->bestelmethode}}</h1>
                <a href="{{ route('werknemers.show', ['order' => $order->id]) }}">Bekijken</a>
            </div>
        @endforeach
    </div>


    <div>
        Just for test purposes needs to get deleted after
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>
</body>

</html>