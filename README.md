# Plaid SDK in PHP

This package has been built to work with Laravel. It is used for a personal project therefore it is missing a number of Plaid API endpoints. If you want to add more, please submit a pull request.

1) Add the package to your Laravel or Lumen project:

```json
    composer require jameron/plaid
```

2) Update your .env file with the following variables:

```php
PLAID_CLIENT_ID=58708b7fbdc6a41245f1b02b
PLAID_SECRET=e61b28ff3bb0c3ce41e6efbf4fe41a
PLAID_CLIENT_NAME='Budget It Up'
PLAID_WEBHOOK='https://api.budgetitup.com/plaid/webhooks'
```

3) Publish the config file:

```php
    php artisan vendor:publish
```

**NOTE Remaining steps are for Lumen only, Laravel handles the setup automatically.

4) Add the class alias to `bootstrap\app.php`

```php
    if (!class_exists('Plaid')) {
        class_alias('Plaid\Plaid', 'Plaid');
    }
```

5) Create config file config/plaid.php

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

6) Add the config to `bootstrap\app.php`

```php
$app->configure('plaid');
```
