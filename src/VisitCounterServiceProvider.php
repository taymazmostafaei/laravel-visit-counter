<?php

namespace Taymaz\Visitcounter;

use Illuminate\Support\ServiceProvider;
use Taymaz\Visitcounter\Middleware\VisitCount;

class VisitCounterServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {
        $this->app['router']->aliasMiddleware('visitcount', VisitCount::class);
    }
}
