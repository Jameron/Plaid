<?php namespace Jameron\Plaid;

use Illuminate\Support\Facades\Facade;

class PlaidFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'plaid';
    }
}
