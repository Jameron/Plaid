# plaid
Plaid API wrapper

This package has been built to work with Laravel 5.4.33 and later. (Some older versions of Laravel may not be compatible.)

Let's see if we can't get you up and running in 10 steps. If you are starting fresh, create your laravel application first thing:

    composer create-project --prefer-dist laravel/laravel blog

1) Add the package to your project:

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

**NOTE  Laravel 5.5+ users there is auto-discovery so you can ignore steps 2 and 3

2) Update your providers:

```php
        Jameron\Plaid\PlaidServiceProvider::class,
```

3) Update your Facades:

```php
        'Plaid' => Jameron\Plaid\Facades\PlaidFacade::class,
```
