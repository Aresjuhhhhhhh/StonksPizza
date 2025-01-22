<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welkom</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center w-full min-h-screen bg-center bg-cover"
    style="background-image: url('/images/IntroBackground.png'); background-size: cover; background-repeat: no-repeat;">
    <div class="flex items-center justify-center w-full min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 bg-opacity-70 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h2 class="text-3xl font-bold mb-4">Welkom {{ Auth::user()->name }}!</h2>
                    <h1 class="text-1xl font-bold mb-4">{{ __("Je bent ingelogd") }}</h1>
                    @if(Auth::user()->Rol == "klant")
                        <p class="text-xl hover:text-black transition rounded-md hover:bg-yellow-400"><a
                                href="{{ route('klant.index') }}">Klik hier!</a></p>
                    @elseif(Auth::user()->Rol == "Medewerker")
                        <p class="text-xl hover:text-black transition rounded-md hover:bg-yellow-400">
                            <a href="{{ route('medewerker.index') }}">Klik hier!</a>
                        </p>
                    @elseif(Auth::user()->Rol == "Manager")
                        <p class="text-xl hover:text-black transition rounded-md hover:bg-yellow-400">{{ __("Manager") }}
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</body>

</html>