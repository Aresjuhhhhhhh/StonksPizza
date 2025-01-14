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

<!--Body-->
<div class="relative homePageImage">
    <img src="{{ asset('images/HomePageImage.png') }}" alt="pizza" class="hpImg w-full">
    <h1 class="absolute inset-0 ml-20 mt-5 flex items-center justify-center text-black text-4xl font-bold">
        Pizza maken is een kunst,<br> en wij zijn de artiesten. <br> Meer smaak. Minder gedoe.
    </h1>
</div>
<div class="relative homePageImage mt-36">
    <img src="{{ asset('images/AchtergrondHomePageMenu.png') }}" class="hpMenuImg" >
    <h1></h1>
</div>
<!--End of body-->



<!--Footer-->

<!--End of foooter-->


</body>
</html>