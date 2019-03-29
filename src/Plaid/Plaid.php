<?php

namespace Jameron\Plaid;

use Carbon\Carbon;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Post\PostBodyInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class Plaid
{
    /**
     * Plaid configuration settings
     *
     * @var array
     */
    protected $config;

    /**
     * Initialize the Guzzle Client and make it ready for all requests
     */
    public static function client()
    {
        return new Guzzle(['base_uri' => config('plaid2.api_host')]);
    }

    /**
     * Exchange token, swaps a public token for access token.
     * @method authGet
     * @param string] $publicToken The public token.
     */
    public static function exchangeToken($publicToken)
    {
        try {
            $request = self::client()->post('/item/public_token/exchange', [
                'json' => [
                    'client_id' => config('plaid2.client_id'),
                    'secret' => config('plaid2.secret'),
                    'public_token' => $publicToken
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    /**
     * [authGet ]
     * @method authGet
     * @param  [string]      $accessToken [description]
     */
    public static function authGet($accessToken)
    {
        try {
            $request = self::client()->post('/auth/get', [
                'json' => [
                    'client_id' => config('plaid2.client_id'),
                    'secret' => config('plaid2.secret'),
                    'access_token' => $accessToken
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }
}
