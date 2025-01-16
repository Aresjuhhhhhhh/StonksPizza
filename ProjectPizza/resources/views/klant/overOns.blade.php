<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over ons</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    @vite('resources/css/overOns.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
</head>

<body class="bodyColor" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/abstractPopArtBG.avif'); 
           background-size: cover; 
           background-repeat: no-repeat; 
           background-attachment: fixed; 
           background-position: center;">
    <!-- Header -->
    <div class="header-container">
        <header>
            <nav>
                <ul class="nav-list">
                    <a class="test" href="{{url('/Home')}}"><img src="{{ asset('images/websiteLogo.jpg') }}" alt="pizza"
                            class="logo"></a>
                    <li><button><a href="{{ url('/menu') }}">Menu</a></button></li>
                    <li><button><a href="{{ url('/overOns') }}">Over ons</a></button></li>
                    <li><button><a href="{{ url('/FAQ') }}">Veelgestelde vragen</a></button></li>
                    <li><button><a href="{{ url('/soliciteren') }}">Solliciteren</a></button></li>
                    <li><button><a href="{{url('/profiel')}}">Profiel</a></button></li>
                    <a href="{{url('/cart')}}"><img src="{{ asset('images/ShoppingCart.png') }}" alt="pizzaCart"
                            class="pizzaCart"></a>
                </ul>
            </nav>
        </header>
    </div>
    <!--End of header-->

    <!--Body-->
    <div class="bg-white OverOnsTekst bg-opacity-70 text-black">
        <h1 class="tekstH1">Het Verhaal van Stonks Pizzaria</h1>
        <p>Welkom bij Stonks Pizzaria! Hier draait alles om meer dan alleen pizza; het gaat om de perfecte mix van
            smaak, creativiteit en plezier.</p>
        <p>De eigenaar van Stonks Pizzaria vindt dat pizza niet zomaar een gerecht is, maar een kunstvorm. Met een
            passie voor kleurrijke ontwerpen en een liefde voor traditionele smaken besloot hij een plek te creëren waar
            iedereen kan genieten van de perfecte punt, in een omgeving die net zo energiek en levendig is als een
            versgebakken pizza.</p>

        <p><strong>Wat maakt Stonks Pizzaria uniek?</strong> Het begint bij de visie: “Pizza moet mensen blij maken,
            zowel in smaak als in sfeer.” Met dit uitgangspunt worden al onze pizza’s gemaakt met de beste ingrediënten,
            zorgvuldig geselecteerd om niet alleen de traditionele Italiaanse smaken te eren, maar ook een verrassende
            twist toe te voegen. Van de klassieke Margherita tot onze unieke creatie Pop Pepperoni, iedere pizza vertelt
            een verhaal.</p>

        <p>De eigenaar vindt ook dat eten niet alleen over smaak gaat, maar over beleving. Daarom is de inrichting van
            Stonks Pizzaria een explosie van kleuren en patronen, geïnspireerd door de pop-artstijl. Elke muur, elke
            decoratie en elk detail ademt energie, humor en creativiteit. Het is een plek waar je niet alleen komt om te
            eten, maar om een ervaring op te doen.</p>

        <p>Bij Stonks Pizzaria houden we van innovatie. De eigenaar staat erop dat er altijd iets nieuws te ontdekken
            is: of het nu een verrassende special is, een speelse variatie op een klassieker, of gewoon een extra scheut
            gezelligheid in ons restaurant. Het draait allemaal om het combineren van geweldige smaak met een omgeving
            die je een glimlach bezorgt.</p>

        <p>Of je nu een snelle hap zoekt of een avond wilt genieten met vrienden en familie, Stonks Pizzaria verwelkomt
            je met open armen. Kom langs en ervaar zelf waarom we niet zomaar een pizzaria zijn—maar een plek waar
            pizza, kunst en plezier samenkomen.</p>

        <p style="text-align: center; font-style: italic;">Want zoals de eigenaar graag zegt: “Pizza is meer dan eten;
            het is een avontuur!”</p>
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