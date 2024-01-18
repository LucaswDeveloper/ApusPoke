<?php

namespace App\Exceptions;

use Exception;

class PokemonApiExceptions extends Exception
{
    /**
     * @param string $errorMessage
     */
    public function __construct(string $errorMessage)
    {
        parent::__construct($errorMessage);
    }
}
