<?php

namespace EmreBaskin\Eadmin\Providers;

use EmreBaskin\Eadmin\Components\eTable;
use EmreBaskin\Eadmin\FormBuilder\eForm;
use Illuminate\Support\ServiceProvider;

class eServiceProviders extends ServiceProvider
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

        $this->app->singleton('EmreBaskin\Eadmin\Components\eTable', function ($app) {
            return new eTable();
        });

        /*
         * Create aliases for the dependency.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('eForm', 'EmreBaskin\Eadmin\FormBuilder\eForm');
        $loader->alias('eTable', 'EmreBaskin\Eadmin\Components\eTable');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views/' . env('EADMIN_THEME', 'dashforge') . '/form', 'eForm');
        $this->loadViewsFrom(__DIR__ . '/../views/' . env('EADMIN_THEME', 'dashforge') . '/table', 'eTable');
    }
}
