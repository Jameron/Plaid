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
        return new Guzzle(['base_uri' => config('plaid.api_host')]);
    }

    /**
     * Exchange token, swaps a public token for access token.
     * @param string $publicToken The public token.
     */
    public static function exchangeToken($publicToken)
    {
        try {
            $request = self::client()->post('/item/public_token/exchange', [
                'json' => [
                    'client_id' => config('plaid.client_id'),
                    'secret' => config('plaid.secret'),
                    'public_token' => $publicToken
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    /**
     * Get dat auth
     * @param string $accessToken - The access token
     */
    public static function transactionsGet($accessToken)
    {
        try {
            $request = self::client()->post('/transactions/get', [
                'json' => [
                    'client_id' => config('plaid.client_id'),
                    'secret' => config('plaid.secret'),
                    'access_token' => $accessToken,
                    'start_date' => Carbon::now()->subDays(30)->format('Y-m-d'),
                    'end_date' => Carbon::now()->format('Y-m-d')
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    /**
     * Get auth
     * @param string $accessToken - The access token
     */
    public static function authGet($accessToken)
    {
        try {
            $request = self::client()->post('/auth/get', [
                'json' => [
                    'client_id' => config('plaid.client_id'),
                    'secret' => config('plaid.secret'),
                    'access_token' => $accessToken
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    /**
     * Get plaid categories.
     *
     * @return json response body
     */
    public static function getCategories()
    {
        try {
            $request = self::client()->post('/categories/get', [
                'body'    => '{}',
                'headers' => [
                    'Content-Type'     => 'application/json',
                ]
            ]);

            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    /**
     * Remove an item
     * @param string $accessToken - The access token
     */
    public static function removeItem($accessToken)
    {
        try {
            $request = self::client()->post('/item/remove', [
                'json' => [
                    'client_id' => config('plaid.client_id'),
                    'secret' => config('plaid.secret'),
                    'access_token' => $accessToken
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    /**
     * Get link token.
     * @method getLinkToken
     * @param string $publicToken The public token.
     * @param mixed $userId The user id, email or other identifier.
     */
    public static function getLinkToken($accessToken, $userId)
    {
        try {
            $request = self::client()->post('/link/token/create', [
                'json' => [
                    'client_id'    => config('plaid.client_id'),
                    'secret'       => config('plaid.secret'),
                    'access_token' => $accessToken,
                    'client_name'  => config('plaid.client_name'),
				    'webhook'      => config('plaid.webhook'),
                    'user'         => [
                        'client_user_id' => '"' . $userId . '"',
                    ],
                    'country_codes' => ['US'],
                    'language'       => 'en',
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    /**
     * Get item.
     * @method itemGet
     * @param string $accessToken The public token.
     */
    public static function itemGet($accessToken)
    {
        try {
            $request = self::client()->post('/item/get', [
                'json' => [
                    'client_id'    => config('plaid.client_id'),
                    'secret'       => config('plaid.secret'),
                    'access_token' => $accessToken,
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

    /**
     * Update webhook link.
     * @method itemWebhookUpdate
     * @param string $accessToken The public token.
     * @param string $webhook The webhook.
     */
    public static function itemWebhookUpdate($accessToken, $webhook)
    {
        try {
            $request = self::client()->post('/item/webhook/update', [
                'json' => [
                    'client_id'    => config('plaid.client_id'),
                    'secret'       => config('plaid.secret'),
                    'access_token' => $accessToken,
                    'webhook'      => $webhook
                ]
            ]);
            return json_decode($request->getBody(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }

}
