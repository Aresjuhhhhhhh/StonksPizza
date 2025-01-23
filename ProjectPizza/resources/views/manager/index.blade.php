<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Pagina</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">
    <div class="header-container2">
        <header>
            <nav>
                <ul class="nav-list">
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{route('werknemers.pizzaToevoegen')}}">Pizza
                                Toevoegen</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{route('werknemers.showPizzas')}}">Pizza's Bekijken</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{route('werknemers.ingredientenIndex')}}">Ingredienten Bekijken</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{route('werknemers.createIngredienten')}}">Ingredienten Toevoegen</a></button>
                    </li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{ route('manager.create') }}">Werker toevoegen</a></button></li>
                    <li>
                        <form class="LogoutKnop" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

        </header>
    </div>


    <div class="flex justify-center space-x-5 mt-5">
        <div class="bg-black bg-opacity-70 overflow-hidden shadow-lg rounded-lg w-1/4">
            <h1 class="p-2">Werkers</h1>
            @foreach ($Werkers as $werker)
                <div class="p-2">
                    <h1>
                        {{$werker->name}}
                    </h1>
                    <a href="{{ route('manager.show', ['id' => $werker->id]) }}"
                        class="text-yellow-300 hover:text-yellow-400 underline">Bekijken</a>
                </div>
            @endforeach
        </div>

        <div class="bg-black bg-opacity-70 overflow-hidden shadow-lg rounded-lg w-1/4">
            <h1 class="p-2">Bezorgers</h1>
            @foreach ($bezorgers as $bezorger)
                <div class="p-2">
                    <h1>
                        {{$bezorger->name}}
                    </h1>
                    <a href="{{ route('manager.show', ['id' => $bezorger->id]) }}"
                        class="text-yellow-300 hover:text-yellow-400 underline">Bekijken</a>
                </div>
            @endforeach
        </div>
    </div>


</body>

</html>