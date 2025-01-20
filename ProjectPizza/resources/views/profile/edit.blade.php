<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel</title>
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
                    <li><button class="hover:underline decoration-yellow-300"><a
                                href="{{ url('/soliciteren') }}">Solliciteren</a></button></li>
                    <li><button class="underline text-yellow-300"><a href="{{url('/profiel')}}">Profiel</a></button>
                    </li>
                    <a href="{{url('/cart')}}"><img src="{{ asset('images/ShoppingCart.png') }}" alt="pizzaCart"
                            class="pizzaCart"></a>
                </ul>
            </nav>
        </header>
    </div>
    <!--End of header-->

    <!-- Content -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 bg-gray-800 bg-opacity-70 text-white sm:p-8 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 bg-gray-800 bg-opacity-70 text-white sm:p-8   shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 bg-gray-800 bg-opacity-70 text-white sm:p-8  shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
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