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
        $this->publishes([
            __DIR__.'/../config/plaid.php' => config_path('plaid.php'),
	    ]);
    	$this->app->bind('Plaid2', function ($app) {
            return new \Jameron\Plaid\Plaid;
        });
	
    }
}
