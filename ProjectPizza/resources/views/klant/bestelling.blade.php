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
    <div class="flex-grow p-5 flex justify-center items-center">
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
                <div class="product-div flex justify-between items-center bg-gray-700 p-4 rounded-lg mb-4 shadow-md">
                    <div>
                        <h1 class="text-2xl font-bold">{{ $winkelmandje->product->naam }} - 
                            €{{ number_format($winkelmandje->product->totaalPrijs, 2) }}
                        </h1>
                        <p class="text-2xl">Quantity: {{ $winkelmandje->quantity }}</p>
                        <p class="text-2xl">
                            Size: {{ $winkelmandje->grootte->afmeting ?? 'Standard' }}
                            @if($winkelmandje->grootte->afmeting !== 'Normaal')
                            ‎ ‎ - ‎ ‎ €{{ number_format($winkelmandje->factorKosten(), 2) }}
                            @endif
                        </p>

                        @if ($winkelmandje->extraIngredients->isNotEmpty())
                            <h3 class="text-2xl font-semibold mt-2">Extra Ingredients:</h3>
                            <ul class="text-2xl">
                                @foreach ($winkelmandje->extraIngredients as $extraIngredient)
                                    <li>{{ $extraIngredient->ingredient->naam }} ‎ ‎ - 
                                    ‎ ‎ €{{ number_format($extraIngredient->ingredient->verkoopPrijs, 2) }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-2xl text-gray-400">No extra ingredients added.</p>
                        @endif
                    </div>

                    <div class="flex gap-2">
                        <form action="{{ route('cart.edit', $winkelmandje->id) }}" method="GET">
                            @csrf
                            <button type="submit" 
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow">
                                ✏️ Edit
                            </button>
                        </form>
                        <form action="{{ route('cart.destroy', $winkelmandje->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow">
                                ❌ Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
            <form>
            <div class="mt-4 flex flex-col items-center gap-4">
            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2">
                    <input type="radio" name="delivery_option" value="bezorgen" class="text-green-500 focus:ring-green-500">
                    <span class="text-white font-medium">Bezorgen</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="delivery_option" value="afhalen" class="text-green-500 focus:ring-green-500">
                    <span class="text-white font-medium">Afhalen</span>
                </label>
            </div>
                <h1 class="text-2xl font-bold text-white">Total: €{{ number_format($totaalPrijs, 2) }}</h1>
                <button type="submit" class="bg-green-500 bestelling-button text-white font-bold py-2 px-4 rounded hover:bg-green-600 shadow-md">
                    Bestelling plaatsen
                </button>
        </div>
            </form>
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