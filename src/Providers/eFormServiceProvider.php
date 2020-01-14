<?php

namespace EmreBaskin\Eadmin\Providers;

use EmreBaskin\Eadmin\FormBuilder\eForm;
use Illuminate\Support\ServiceProvider;

class eFormServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('EmreBaskin\Eadmin\FormBuilder\eForm', function ($app) {
            return new eForm();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views/'.env('EADMIN_THEME', 'dashforge').'/form', 'eForm');
    }
}
