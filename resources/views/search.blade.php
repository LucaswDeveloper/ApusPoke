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
                @if($errors->any())
                    <div class="p-6 error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset($result['status']) && $result['status'])

                    @if($result['term'])
                        <div class="p-6">
                            Você buscou por: {{ $result['term'] }}
                        </div>
                    @endif

                    @if($result['data'])
                        <div class="p-6">
                            <strong>Resultado do Busca:</strong>
                            <table>
                                <tr>
                                    <th>Imagem</th>
                                    <th>Nome do Pokemon</th>
                                    <th>Peso</th>
                                    <th>Altura</th>
                                    <th>Tipos</th>
                                    <th>Favoritar Pokemon</th>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">
                                        <img style="height: 100px;width:100px!important" src="{{ $result['data']['sprites']['front_default'] }}" alt="Imagem de {{ $result['data']['name'] }}">
                                    </td>
                                    <td><strong>{{ ucfirst($result['data']['name']) }}</strong></td>
                                    <td>{{ $result['data']['weight'] }}</td>
                                    <td>{{ $result['data']['height'] }}</td>
                                    <td>
                                        @foreach($result['data']['types'] as $type)
                                            {{ $type['type']['name'] }}
                                            @if(!$loop->last), @endif
                                        @endforeach
                                    </td>
                                    <td>
                                    <form action="{{ url('/favoritar') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="image" value="{{ $result['data']['sprites']['front_default'] }}">
                                        <input type="hidden" name="name" value="{{ $result['data']['name'] }}">
                                        <input type="hidden" name="weight" value="{{ $result['data']['weight'] }}">
                                        <input type="hidden" name="height" value="{{ $result['data']['height'] }}">
                                        <input type="hidden" name="types" value="{{ json_encode($result['data']['types']) }}">
                                        <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md bg-yellow focus:outline-none transition ease-in-out duration-150">
                                            Favoritar Pokemon
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
