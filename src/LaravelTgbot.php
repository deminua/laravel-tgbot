<?php

namespace Deminua\LaravelTgbot;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

use Telegram\Bot\Api;
use Deminua\LaravelTgbot\Models\TelegramBot;

class LaravelTgbot extends ServiceProvider
{
  public function boot()
  {
    // $this->loadRoutesFrom(__DIR__ . '/./routes/web.php');
    $this->loadMigrationsFrom(__DIR__ . '/./database/migrations');
    $this->loadViewsFrom(__DIR__ . '/./resources/views', 'laravel-tgbot');
    $this->publishes([
      __DIR__ . '/./resources/views/message.blade.php' => resource_path('views/vendor/laravel-tgbot/message.blade.php'),
    ], 'laravel-tgbot-views');
  }

  public function register()
  {
  }

  public static function routes($data = [])
  {
    Route::group($data, function () {
      require __DIR__ . '/./routes/routes.php';
    });
  }

  public static function send($data, $response)
  {
    $bots = TelegramBot::with('clients')->get();
    foreach ($bots as $bot) {

      $telegram = new Api($bot->token);

      foreach ($bot->clients as $client) {
        $telegram->sendMessage([
          'chat_id' => $client->id,
          'text' => view('laravel-tgbot::message', compact('data'))->render(),
          'parse_mode' => 'HTML'
        ]);
      }
    }

    return $response;
  }
}
