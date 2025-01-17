<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    @vite('resources/css/bestelling.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
    <title>Bestelling plaatsen</title>
</head>

<body class="bodyColor min-h-screen flex flex-col bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif');">
    <!-- Header -->
    <div class="header-container">
        <header>
            <nav>
                <ul class="nav-list">
                    <a class="test" href="{{url('/Home')}}"><img src="{{ asset('images/websiteLogo.jpg') }}" alt="pizza"
                            class="logo"></a>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{ url('/menu') }}">Menu</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a href="{{ url('/overOns') }}">Over
                                ons</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a href="{{ url('/FAQ') }}">Veelgestelde
                                vragen</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{ url('/soliciteren') }}">Solliciteren</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{url('/profiel')}}">Profiel</a></button></li>
                    <a href="{{url('/cart')}}"><img src="{{ asset('images/ShoppingCart.png') }}" alt="pizzaCart"
                            class="pizzaCart"></a>
                </ul>
            </nav>
        </header>
    </div>
    <!-- End of header -->

    <!-- Content -->
    <div class="flex-grow flex justify-center items-center">
        <div
            class="bestelling-container bg-gray-800 bg-opacity-70 max-w-3xl w-full p-6 rounded-lg shadow-lg text-white">
            <div>
            @foreach($winkelmandje as $item)
                <p class="mb-4">
                    <strong>Pizza Naam:</strong>
                    {{ $item->product->naam ?? 'Onbekend product' }}
                </p>
                <p class="mb-4">
                    <strong>Extra Ingrediënten:</strong>
                    {{ implode(', ', $item->extraIngredients->pluck('naam')->toArray()) }}
                </p>
                <p class="mb-4">
                    <strong>Aantal:</strong>
                    {{ $item->quantity }}
                </p>
                <p class="mb-4">
                    <strong>Grootte:</strong>
                    {{ $item->size }}

                </p>
            @endforeach
            </div>
            <div>
                <button>✏️</button>
                <button>✏️</button>
                <button>✏️</button>
            </div>
        </div>
    </div>
    <!-- End of content -->

    <!-- Footer -->
    <div class="footer-container bg-gray-800 text-white py-4">
        <footer class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="ml-16">
                <h1 class="text-lg font-bold">Contact</h1>
                <p>Telefoon: 06-42069420</p>
                <p>Email: StonksPizzeria@gmail.com</p>
            </div>
            <div class="text-center flex-grow ml-16">
                © 2025 Alle rechten voorbehouden aan Stonks Pizzeria
            </div>
        </footer>
    </div>
    <!-- End of footer -->
</body>

</html>