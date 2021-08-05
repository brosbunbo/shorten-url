<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\ShortenUrlRepository::class, \App\Repositories\ShortenUrlRepositoryEloquent::class);
        //:end-bindings:

        $this->app->bind(\App\Services\ShortenUrlService::class, \App\Services\ShortenUrlServiceEloquent::class);
    }
}
