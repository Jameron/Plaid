<?php
return [
    'api_host'   => 'https://development.plaid.com/',
    'client_id'  => env('PLAID_CLIENT_ID'),
    'secret'     => env('PLAID_SECRET'),
    'client_name' => env('PLAID_CLIENT_NAME'),
    'webhook'    => env('PLAID_WEBHOOK')
];
