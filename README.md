# Plaid SDK in PHP

This package has been built to work with Laravel. It is used for a personal project therefore it is missing a number of Plaid API endpoints. If you want to add more, please submit a pull request.

1) Add the package to your Laravel or Lumen project:

```json
    composer require jameron/plaid
```

2) Add PLAID_CLIENT_ID, PLAID_SECRET to your .env file and then publish (this copies the config file from the vendor directory to the laravel config/ directory) the config file:

```php
    php artisan vendor:publish
```

**NOTE Remaining steps are for Lumen only, Laravel is setup automatically.
3) Add the class alias to `bootstrap\app.php`

```php
    if (!class_exists('Plaid')) {
        class_alias('Plaid\Plaid', 'Plaid');
    }
```

4) Create config file config/plaid.php

```php
<?php

return [
    'api_host'    => 'https://development.plaid.com/',
    'client_id'   => env('PLAID_CLIENT_ID'),
    'secret'      => env('PLAID_SECRET'),
    'client_name' => env('PLAID_CLIENT_NAME'),
    'webhook'     => env('PLAID_WEBHOOK')
];
```

5) Add the config to `bootstrap\app.php`

```php
$app->configure('plaid');
```
