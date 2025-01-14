<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>Klant page</h1>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('klant.index') }}">Home</a></li>
                <li><a href="{{ route('klant.overOns') }}">Over ons</a></li>
                <li><a href="{{ route('klant.menu') }}">Menu</a></li>
                <li><a href="{{ route('klant.FAQ') }}">Veelgestelde vragen</a></li>
                <li><a href="{{ route('klant.soliciteren') }}">Soliciteren</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>