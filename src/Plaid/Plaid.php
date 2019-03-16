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

    public static function test($username, $password, $institution) {
        return self::addAuthUser($username, $password,null, $institution);
    }

    /**
     * Initialize the Guzzle Client and make it ready for all requests
     */
    public static function client()
    {
        return new Guzzle(['base_uri' => config('plaid2.api_host')]);
    }

    /**
     * [addAuthUser description]
     * @method addAuthUser
     * @param  [string]      $username [description]
     * @param  [string]      $password [description]
     * @param  [string]      $pin      [description]
     * @param  [string]      $institutionId     [description]
     */
    public static function addAuthUser($username, $password, $pin = null, $institutionId)
    {
        try {
            $request = self::client()->post('auth', [
                'json' => [
                    'client_id' => config('plaid2.client_id'),
                    'secret' => config('plaid2.secret'),
                    'username' => $username,
                    'password' => $password,
                    'pin' => $pin,
                    'type' => $institutionId,
                    'options' => [
                        'list' => config('plaid.auth.list')
                    ]
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }
}
