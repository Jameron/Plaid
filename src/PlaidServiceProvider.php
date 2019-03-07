<?php

namespace Jameron\Plaid;

use Illuminate\Support\ServiceProvider;

class PlaidServiceProvider extends ServiceProvider
{
    protected $package = 'plaid';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    	$this->app->bind('Plaid2', function ($app) {
            return new \Jameron\Plaid\Plaid;
        });

    }
}
