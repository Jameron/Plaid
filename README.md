# plaid
Plaid API wrapper

This package has been built to work with Laravel 5.4.33 and later. (Some older versions of Laravel may not be compatible.)

1) Add the package to your Laravel or Lumen project:

```json
    composer require jameron/plaid
```
1a) or manually update your composer.json file

```json
    "jameron/plaid": "*",
```
```
composer update
```

**NOTE  Lumen only:

2) Add the class alias to `bootstrap\app.php`

```php
    if (!class_exists('Plaid2')) {
        class_alias('Jameron\Plaid\Plaid', 'Plaid2');
    }
```

3) Create a config file:

```php
    app/config/plaid2.php
```

```php
<?php

return [
    'baseUrl' => 'https://tartan.plaid.com/',
    'client_id' => env('PLAID_CLIENT_ID'),
    'secret' => env('PLAID_SECRET')
];
```

4) Add the config to `bootstrap\app.php`

```php
$app->configure('plaid2');
```
