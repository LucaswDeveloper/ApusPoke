<?php

namespace App\Http\Controllers\Api;

use App\Contracts\PokemonApiInterface;
use App\Exceptions\PokemonApiExceptions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class PokemonApiController extends Controller
{
    /**
     * @var PokemonApiInterface
     */
    protected PokemonApiInterface $pokemonApi;

    /**
     * @param PokemonApiInterface $pokemonApi
     */
    public function __construct(PokemonApiInterface $pokemonApi)
    {
        $this->pokemonApi = $pokemonApi;
    }

    /**
     * @param string $term
     * @return mixed
     */
    public function getPokemon(string $term): mixed
    {
        if (is_numeric($term)) {
            $message = 'O Parâmetro (term) não é uma string válida!';
            Log::error($message);
            throw new PokemonApiExceptions($message);
        }

        if (empty($term)) {
            $message = 'O Parâmetro (term) está vazio!';
            Log::error($message);
            throw new PokemonApiExceptions($message);
        }

        try {
            $resultApi = $this->pokemonApi->getPokemon($term);
            return response()->json($resultApi);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Pokemon não encontrato :´(.'], 404);
        }
    }
}
