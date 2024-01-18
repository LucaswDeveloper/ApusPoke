<?php

namespace App\Services;

use App\Contracts\PokemonApiInterface;
use GuzzleHttp\Client;

class PokeApiService implements PokemonApiInterface
{
    /**
     * @var Client
     */
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => config('pokeapi.base_uri')]);
    }

    /**
     * @param string $name
     * @return array
     */
    public function getPokemon(string $name): array
    {
        $response = $this->client->request('GET', "pokemon/$name");
        return json_decode($response->getBody(), true);
    }
}
