<?php

namespace App\Contracts;

interface PokemonApiInterface
{
    /**
     * @param string $name
     * @return void
     */
    public function getPokemon( string $name): array;
}
