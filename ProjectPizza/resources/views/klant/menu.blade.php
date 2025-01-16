<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    @vite('resources/css/menu.css')
    <link rel="icon" href="{{ asset('images/PizzarriaIcon.png') }}" type="image/png">
</head>
<body class="bodyColor" >
    <!-- Header -->
<div class="header-container">
    <header>
        <nav>
            <ul class="nav-list">
            <a class="test" href="{{url('/Home')}}" ><img src="{{ asset('images/websiteLogo.jpg') }}" alt="pizza" class="logo"></a>
                <li><button><a href="{{ url('/menu') }}"  >Menu</a></button></li>
                <li><button><a href="{{ url('/overOns') }}" >Over ons</a></button></li>
                <li><button><a href="{{ url('/FAQ') }}">Veelgestelde vragen</a></button></li>
                <li><button><a href="{{ url('/soliciteren') }}">Solliciteren</a></button></li>
                <li><button><a href="{{url ('/profiel')}}">Profiel</a></button></li>
                <a href="{{url('/cart')}}"  ><img src="{{ asset('images/ShoppingCart.png') }}" alt="pizzaCart" class="pizzaCart"></a>
            </ul>
        </nav>

    </header>


</div>
<!--End of header-->

<div class="menu-container">
    @foreach($menuItems as $Item)
    <div class="menu" style="background-image: url('{{ asset('images/HoutBG.png') }}');">
        <div class="menu-image">
            <img src="{{ asset('images/' . $Item->imagePath) }}" alt="pizza" class="pizza">
        </div>
        <div class="menu-content">
            <h2 class="menu-title">{{$Item->naam}}</h2>
            <p class="menu-description">{{$Item->beschrijving}}</p>
            <p class="menu-price">€{{$Item->totaalPrijs}}</p>
        </div>
        <button class="menu-button" >Toevoegen</button>
    </div>
    @endforeach
</div>



</body>
</html>