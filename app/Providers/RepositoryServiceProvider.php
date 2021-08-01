<?php

namespace App\Providers;

use App\Interfaces\KnightRepositoryInterface;
use App\Repositories\KnightRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KnightRepositoryInterface::class, KnightRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
