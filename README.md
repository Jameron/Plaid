# Plaid SDK in PHP

This package has been built to work with Laravel.

1) Add the package to your Laravel or Lumen project:

```json
    composer require jameron/plaid
```

2) Laravel users need to update your Facades list

```php
'Regulator' => Jameron\Regulator\Facades\RegulatorFacade::class,
```

**NOTE  Lumen only:

If using Lumen add the class alias to `bootstrap\app.php`

```php
    if (!class_exists('Plaid')) {
        class_alias('Plaid\Plaid', 'Plaid');
    }
```

3) Add PLAID_CLIENT_ID, PLAID_SECRET to your .env file and then create a config file:

```php
    config/plaid.php
```

```php
<?php

return [
    'api_host'  => 'https://development.plaid.com/',
    'client_id' => env('PLAID_CLIENT_ID'),
    'secret'    => env('PLAID_SECRET')
];
```

If using Lumen add the config to `bootstrap\app.php`

```php
$app->configure('plaid');
```
