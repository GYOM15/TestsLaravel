<?php

namespace App\Providers;

use App\Weather;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * Nous créeons notre service en singleton, c'est à dire que cela reste inchangeable et aussi 
     * nous lui passons une closure pour lui dire comment générer notre Weather
     */
    public function register(): void
    {
        $this->app->singleton(Weather::class, fn() => new Weather('demo'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
