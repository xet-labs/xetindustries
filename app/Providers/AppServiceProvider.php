<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        define('URL', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        define('SITE_NAME', "Xet Industries");

    }
}