<form method="POST" action="{{ route('profile.update-woonplaats') }}">
    @csrf
    @method('PUT')

    <div>
        <label for="woonplaats" class="block font-medium text-sm text-gray-200">Woonplaats</label>
        <input id="woonplaats" type="text" name="woonplaats" value="{{ old('woonplaats', auth()->user()->woonplaats) }}"
            class="mt-1 block w-full rounded-md bg-gray-900 border-gray-700 text-gray-300 shadow-sm focus:ring focus:ring-yellow-300 focus:border-yellow-300">
        @error('woonplaats')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4 mb-4">
        <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            Opslaan
        </button>
    </div>
</form>