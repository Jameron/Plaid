<?php namespace Jameron\Plaid\Facades;

use Illuminate\Support\Facades\Facade;

class Plaid extends Facade
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
