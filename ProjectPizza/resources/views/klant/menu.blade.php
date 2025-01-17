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
                <a class="test" href="{{url('/Home')}}"><img src="{{ asset('images/websiteLogo.jpg') }}" alt="pizza" class="logo"></a>
                <li><button class="underline text-yellow-300"><a href="{{ url('/menu') }}">Menu</a></button></li>
                <li><button class="hover:underline decoration-yellow-300"><a href="{{ url('/overOns') }}">Over ons</a></button></li>
                <li><button class="hover:underline decoration-yellow-300"><a href="{{ url('/FAQ') }}">Veelgestelde vragen</a></button></li>
                <li><button class="hover:underline decoration-yellow-300"><a href="{{ url('/soliciteren') }}">Solliciteren</a></button></li>
                <li><button class="hover:underline decoration-yellow-300"><a href="{{url('/profiel')}}">Profiel</a></button></li>
                <a href="{{url('/cart')}}"><img src="{{ asset('images/ShoppingCart.png') }}" alt="pizzaCart"
                        class="pizzaCart"></a>
            </ul>
        </nav>

    </header>
</div>
<!--End of header-->
<script>
    // Function to show the hidden div and populate the pizza details
function showPizzaDetails(id, name, description, price, imagePath) {
    // Show the hidden div
    document.getElementById('addItemContainer').style.display = 'block';

    // Populate the pizza details in the div
    console.log(id, name, description, price, imagePath);  // Debugging line
    document.getElementById('pizza-name').innerText = name;
    document.getElementById('pizza-description').innerText = description;
    document.getElementById('pizza-price').innerText = '€' + price;
    document.getElementById('pizza-image').src = '{{ asset('images/') }}' + '/' + imagePath;
    document.getElementById('pizza-id').value = id;


}

// Function to close the hidden div
function closeAddItemContainer() {
    document.getElementById('addItemContainer').style.display = 'none';
}
    </script>


<div class="menu-container">
    @foreach($menuItems as $Item)
    <div class="menu" style="background-image: url('{{ asset('images/HoutBG.png') }}'); ">
        <div class="menu-image">
            <img src="{{ asset('images/' . $Item->imagePath) }}" alt="pizza" class="pizza">
        </div>
        <div class="menu-content">
            <h2 class="menu-title">{{$Item->naam}}</h2>
            <p class="menu-description">{{$Item->beschrijving}}</p>
            <p class="menu-price">€{{$Item->totaalPrijs}}</p>
    <button type="button" class="menu-button" 
            onclick="showPizzaDetails({{ $Item->id }}, '{{ $Item->naam }}', '{{ $Item->beschrijving }}', 
            '{{ $Item->totaalPrijs }}', '{{ $Item->imagePath }}')">
            Toevoegen</button>
        </div>
    </div>
    @endforeach
</div>



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