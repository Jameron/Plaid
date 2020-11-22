<?php

namespace Jameron\Plaid;

use Illuminate\Support\ServiceProvider;
use Jameron\Plaid\Plaid;

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
    	$this->app->bind('Plaid', function ($app) {
            return new Plaid;
        });

    }
}
