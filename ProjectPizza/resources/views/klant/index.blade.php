<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant</title>
    @vite('resources/css/app.css')
</head>
<body class="bodyColor" >
<!-- Header -->
    <div class="header-container">
    <img src="{{ asset('images/websiteLogo.jpg') }}" alt="pizza" class="logo">
    <header>
        <nav>
            <ul class="nav-list">
                <li><a href="{{ url('/menu') }}"  class="text-white font-bold">Menu</a></li>
                <li><a href="{{ url('/overOns') }}"  class="text-white font-bold">Over ons</a></li>
                <li><a href="{{ url('/FAQ') }}">Veelgestelde vragen</a></li>
                <li><a href="{{ url('/soliciteren') }}">Soliciteren</a></li>
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