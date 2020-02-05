<?php

namespace EmreBaskin\Eadmin\Providers;

use EmreBaskin\Eadmin\Components\eComp;
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

        $this->app->singleton('EmreBaskin\Eadmin\Components\eComp', function ($app) {
            return new eComp();
        });

        $this->app->singleton('EmreBaskin\Eadmin\Helpers\eHelper', function ($app) {
            return new eHelper();
        });

        /*
         * Create aliases for the dependency.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('eForm', 'EmreBaskin\Eadmin\FormBuilder\eForm');
        $loader->alias('eComp', 'EmreBaskin\Eadmin\Components\eComp');
        $loader->alias('eHelper', 'EmreBaskin\Eadmin\Helpers\eHelper');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([  __DIR__.'/../Assets/Images' => public_path('eadmin/img')], 'eadmin');
        $this->publishes([  __DIR__.'/../Assets/Javascripts' => public_path('eadmin/js')], 'eadmin');
        $this->loadRoutesFrom(__DIR__.'/../Routes/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../views/' . env('EADMIN_THEME', 'dashforge') . '/form', 'eForm');
        $this->loadViewsFrom(__DIR__ . '/../views/' . env('EADMIN_THEME', 'dashforge') . '/components', 'eComp');
    }
}
