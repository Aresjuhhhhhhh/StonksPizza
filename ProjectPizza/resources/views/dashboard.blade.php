<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                @if(Auth::user()->Rol == "klant")
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('klant.index') }}">Home</a>
                </div>
                @elseif(Auth::user()->Rol == "Medewerker")

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Medewerker") }}
                </div>

                @elseif(Auth::user()->Rol == "Manager")
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Manager") }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
