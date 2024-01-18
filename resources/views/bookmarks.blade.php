<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Favoritos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">       
                <div class="p-6">
                    <strong>Lista de Pokemons Favoritados:</strong><br>
                    <a href="{{ url('/search') }}">Buscar novo Pokemon</a>
                    <div class="p-6">
                        <table>
                            <tr>
                                <th>Imagem</th>
                                <th>Nome do Pokemon</th>
                                <th>Peso</th>
                                <th>Altura</th>
                                <th>Tipos</th>
                                <th>Favoritar Pokemon</th>
                            </tr>
                            @if($results)
                                @foreach($results as $row)
                                    <tr>
                                        <td style="width: 20%;">
                                            <img style="height: 100px;width:100px!important" src="{{  $row['image'] }}" alt="Imagem de {{ $row['name'] }}">
                                        </td>
                                        <td><strong>{{ ucfirst($row['name']) }}</strong></td>
                                        <td>{{ $row['weight'] }}</td>
                                        <td>{{ $row['height'] }}</td>
                                        <td>
                                            @foreach(json_decode($row['types']) as $typeRow)
                                                {{ $typeRow->type->name }}
                                                @if(!$loop->last), @endif
                                            @endforeach
                                        </td>
                                        <td>
                                        <form action="{{ url('/favoritar-destroy') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="id" value="{{ $row['id'] }}">
                                            <button onclick="return confirmDelete()" type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md bg-red focus:outline-none transition ease-in-out duration-150">
                                                Remover do Favorito
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" style="text-align: center;"> Nenhum Pokemon favoritado até o momento.</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
