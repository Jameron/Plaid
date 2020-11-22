<?php

namespace Jameron\Plaid;

use Illuminate\Support\ServiceProvider;
use Jameron\Plaid\Plaid;

class PlaidServiceProvider extends ServiceProvider
{
    protected $package = 'plaid';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    	$this->app->bind(Plaid::class, function ($app) {
            return new Plaid();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/plaid.php' => config_path('plaid.php'),
        ]);
    }
}
