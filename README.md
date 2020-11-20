# plaid
Plaid SDK PHP

This package has been built to work with Laravel.

1) Add the package to your Laravel or Lumen project:

```json
    composer require jameron/plaid
```

**NOTE  Lumen only:

2) If using Lumen add the class alias to `bootstrap\app.php`

```php
    if (!class_exists('Plaid')) {
        class_alias('Plaid\Plaid', 'Plaid');
    }
```

3) Create a config file:

```php
    app/config/plaid.php
```

```php
<?php

return [
    'baseUrl' => 'https://tartan.plaid.com/',
    'client_id' => env('PLAID_CLIENT_ID'),
    'secret' => env('PLAID_SECRET')
];
```

4) If using Lumen add the config to `bootstrap\app.php`

```php
$app->configure('plaid');
```
