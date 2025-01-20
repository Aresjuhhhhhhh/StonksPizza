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
    <script>
        // Hide the success message after 5 seconds
        window.onload = function () {
            const successMessage = document.getElementById('verwijder-message');
            if (successMessage) {
                setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 2000);
            }
        };
    </script>




    <!-- Content -->
    <div class="flex-grow flex justify-center items-center">
        <div
            class="bestelling-container bg-gray-800 bg-opacity-70 max-w-3xl w-full p-6 rounded-lg shadow-lg text-white">

            @if(session('verwijderMessage'))
                <div id="verwijder-message" class="success-message">
                    {{ session('verwijderMessage') }}
                </div>
            @endif

            @if($winkelmandjes->isEmpty())
                <div class="align-text-center">
                    <p>Je winkelmandje is leeg</p>
                </div>
            @else
                @foreach ($winkelmandjes as $winkelmandje)
                    <div class="product-div">

                        <div>
                            <h1>{{ $winkelmandje->product->naam }} -
                                €{{ number_format($winkelmandje->product->totaalPrijs, 2) }}</h1>
                            <p>Quantity: {{ $winkelmandje->quantity }}</p>
                            <p>
                                Size: {{ $winkelmandje->grootte->afmeting ?? 'Standard' }}
                                @if($winkelmandje->grootte->afmeting !== 'Normaal')
                                    - €{{ number_format($winkelmandje->factorKosten(), 2) }}
                                @endif
                            </p>

                            @if ($winkelmandje->extraIngredients->isNotEmpty())
                                <h3>Extra Ingredients:</h3>
                                <ul>
                                    @foreach ($winkelmandje->extraIngredients as $extraIngredient)
                                        <li>{{ $extraIngredient->ingredient->naam }} -
                                            €{{ number_format($extraIngredient->ingredient->verkoopPrijs, 2) }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No extra ingredients added.</p>
                            @endif
                        </div>

                        <div>
                            <form action="{{ route('cart.edit', $winkelmandje->id) }}" method="GET">
                                @csrf
                                <button type="submit">✏️</button>
                            </form>
                            <form action="{{ route('cart.destroy', $winkelmandje->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">❌</button>
                            </form>
                        </div>

                    </div>
                @endforeach

                <div>
                    <h1>Total: €{{ number_format($totaalPrijs, 2) }}</h1>
                </div>
            @endif
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