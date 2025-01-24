<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solliciteren</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
</head>

<body class="bodyColor"
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
                    <li><button class="underline text-yellow-300"><a
                                href="{{ url('/soliciteren') }}">Solliciteren</a></button></li>
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{url('/profiel')}}">Profiel</a></button></li>
                    <a href="{{url('/cart')}}"><img src="{{ asset('images/ShoppingCart.png') }}" alt="pizzaCart"
                            class="pizzaCart"></a>
                </ul>
            </nav>
        </header>
    </div>
    <!--End of header-->

    <!--Content-->
    <div>
        <div class="max-w-2xl mx-auto my-10 p-4 flex justify-center">
            <img src="{{ asset('images/WebsiteImage5.png') }}" class="mx-auto">
        </div>
    </div>
    <div>
        <form>
            @csrf
            <div class="max-w-4xl mx-auto my-10 p-4 bg-gray-800 bg-opacity-70 rounded shadow">
                <h2 class="text-2xl font-bold text-center text-yellow-400 mb-4">Solliciteren</h2>
                <div class="space-y-2">
                    <label for="naam" class="text-white">Naam:</label>
                    <input type="text" id="naam" name="naam"
                        class="w-full p-2 bg-gray-700 rounded border border-gray-600 text-white" required>
                </div>
                <div class="space-y-2">
                    <label for="geboortedatum" class="text-white
                    ">Geboortedatum:</label>
                    <input type="date" id="geboortedatum" name="geboortedatum"
                        class="w-full p-2 bg-gray-700 rounded border border-gray-600 text-white" required>
                </div>
                <div class="space-y-2">
                    <label for="email" class="text-white">Email:</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-2 bg-gray-700 rounded border border-gray-600 text-white" required>
                </div>
                <div class="space-y-2">
                    <label for="telefoonnummer" class="text-white
                    ">Telefoonnummer:</label>
                    <input type="tel" id="telefoonnummer" name="telefoonnummer"
                        class="w-full p-2 bg-gray-700 rounded border border-gray-600 text-white" required>
                </div>
                <div class="space-y-2">
                    <label for="functie" class="text-white">
                        Functie:</label>
                    <select id="functie" name="functie"
                        class="w-full p-2 bg-gray-700 rounded border border-gray-600 text-white" required>
                        <option value="Kok">Kok</option>
                        <option value="Bezorger">Bezorger</option>
                        <option value="Kassamedewerker">Kassamedewerker</option>
                        <option value="Schoonmaker">Schoonmaker</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="motivatie" class="text-white
                    ">Motivatie:</label>
                    <textarea id="motivatie" name="motivatie"
                        class="w-full p-2 bg-gray-700 rounded border border-gray-600 text-white" required>
                    </textarea>
                </div>
                <div>
                    <button type="submit"
                        class="w-full p-2 bg-yellow-400 rounded border border-gray-600 text-black">Solliciteren</button>
                </div>
        </form>
    </div>
    <!-- End of content -->

    <!--Footer-->
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
    <!--End of footer-->
</body>

</html>