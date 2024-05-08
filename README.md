Laravel Telegram Bot (+panel)
==========================
Package **Laravel 11** that will expand the functionality of the application in the form of routes, a Telegram bot key control panel and sending messages to a chat or Telegram group.

Installing
==========

Add the dependency to your project:

```bash
composer require deminua/laravel-tgbot dev-main
```

Usage
=====
```php bootstrap/providers.php
<?php

/**
 * bootstrap/providers.php
 * add Deminua\LaravelTgbot\LaravelTgbot::class to array
 */
 
return [
    App\Providers\AppServiceProvider::class,
    Deminua\LaravelTgbot\LaravelTgbot::class,
];
```

Using Routes
===
```php routes/web.php
<?php

/**
 * routes/web.php
 * LaravelTgbot::routes(['prefix' => 'telegram', 'middleware' => 'auth']);
 */


LaravelTgbot::routes();

```
Sending message
===
LaravelTgbot::send($data, $response);

*$data* and *$response* are required!
```php routes/web.php
<?php

/**
 * routes/web.php
 * For example, you can define your route:
*/
Route::get('send', function () {

    $data = [
        'title' => 'Test',
        'name' => 'Bob',
        'email' => 'test@test.com',
        'phone' => '+380960000000',
        'url' => url()->previous()
    ];
    
    $response = response()->json(['message' => __('Thank you, has been successfully, we will contact you soon!')]);

    return LaravelTgbot::send($data, $response);
    
});

```
Route list
===
```
php artisan route:list

  GET|HEAD   send .......................................
  GET|HEAD   telegram ...................................
  POST       telegram ...................................
  GET|HEAD   telegram/edit/{bot} ........................
  POST       telegram/edit/{bot} ........................
  GET|HEAD   telegram/edit/{bot}/delete_client/{client} .
  POST       telegram/edit/{bot}/new_client .............
  GET|HEAD   telegram/edit/{bot}/test_client/{client} ...
```

Migrate 
===
Migrate create tables: telegram_bots, telegram_clients
```
php artisan migrate
```

Data to View
===
$data is passed to view - message.blade.php, can be overridden:
```
php artisan vendor:publish --tag=laravel-tgbot-views
```
