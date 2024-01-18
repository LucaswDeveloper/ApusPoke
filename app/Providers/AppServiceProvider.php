<?php

namespace App\Providers;

use App\Contracts\PokemonApiInterface;
use App\Services\PokeApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PokemonApiInterface::class, PokeApiService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
