<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                    <a href="{{url('/Home')}}"><img src="{{ asset('images/websiteLogo.jpg') }}" alt="pizza"
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
    <!--End of header-->
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
    <!--Body-->
    @if(session('deletemessage'))
        <div id="message" class="success-message">
            {{ session('deletemessage') }}
        </div>
    @endif
    <div class="relative homePageImage">
        <img src="{{ asset('images/HomePageImage.png') }}" alt="pizza" class="hpImg w-full">
        <h1
            class="absolute sloganTekst inset-0 ml-20 mt-5 flex items-center justify-center text-white text-4xl font-bold">
            Pizza maken is een kunst,<br> en wij zijn de artiesten. <br> Meer smaak. Minder gedoe.
        </h1>
    </div>
    <div class="relative homePageImage mt-36 mb-10">
        <img src="{{ asset('images/AchtergrondHomePageMenu.png') }}" class="hpMenuImg">
        <img src="{{ asset('images/MenuHomePagePizzas.png')}}" class="absolute">
        <h1 class="absolute menuTekst"><a href="{{url('/menu')}}">Bekijk het menu hier!</a></h1>
    </div>
    <div class="thirdDiv">
        <h1 class=" thirdDivTekst">Ook interesant</h1>
        <div class="ImgDivs">
            <div>
                <a href="{{url('/overOns')}}" class="aTag"><img src="{{ asset('images/overOnsAchtergrond.png') }}"
                        class="overOnsimg"></a>

            </div>
            <div>
                <a href="{{url('/soliciteren')}}" class="aTag"><img
                        src="{{ asset('images/SoliciterenAchtergrond.png') }}" class="solliciterenImg"></a>
            </div>
        </div>
    </div>
    <!--End of body-->



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