<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Busca') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="pokemon-search-form">
                        <form action="{{ url('/search-post') }}" method="POST">
                            @csrf
                            <label for="busca">Efetuar busca:</label>
                            <input type="text" id="busca" name="busca" placeholder="Busque aqui seu Pokemon"><br>

                            <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                Efetuar Busca
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
