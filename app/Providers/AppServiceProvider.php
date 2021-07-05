<?php

namespace App\Providers;

use App\Honeypot\Honeypot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Honeypot::abortUsing(function () {
            abort(404,'Handle it however you want');
        });
    }
}
