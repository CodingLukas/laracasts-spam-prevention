<?php

namespace App\Providers;

use App\Honeypot\View\Components\Honeypot;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class HoneypotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Honeypot/config/honeypot.php', 'honeypot');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('honeypot', Honeypot::class);
    }
}
