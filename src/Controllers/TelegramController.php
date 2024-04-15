<?php

namespace Deminua\LaravelTgbot\Controllers;

use Illuminate\Http\Request;

use Telegram\Bot\Api;
use Deminua\LaravelTgbot\Models\TelegramBot;
use Deminua\LaravelTgbot\Models\TelegramClient;

/**
 *  DEV
 */

class TelegramController
{
    public function index()
    {
        $bots = TelegramBot::get();
        return view('laravel-tgbot::index', compact('bots'));
    }

    public function store(Request $request)
    {
        $telegram = new Api($request->token);

        if ($request->webhook_url) {
            $telegram->setWebhook(['url' => $request->webhook_url]);
        } else {
            $telegram->deleteWebhook();
        }

        $bot = new TelegramBot();
        $bot->fill($request->all());
        $bot->save();

        return redirect()->back();
    }

    public function update(Request $request, TelegramBot $bot)
    {
        $telegram = new Api($request->token);

        if ($request->webhook_url) {
            $telegram->setWebhook(['url' => $request->webhook_url]);
        } else {
            $telegram->deleteWebhook();
        }

        $bot->fill($request->all());
        $bot->save();

        return redirect()->back();
    }

    public function edit(TelegramBot $bot)
    {
        $telegram = new Api($bot->token);
        return view('laravel-tgbot::edit', compact('bot', 'telegram'));
    }

    public function new_client(Request $request, TelegramBot $bot)
    {
        if ($request->from) {
            $client = new TelegramClient();
            $client->fill(json_decode($request->from, true));
            $client->bot_id = $bot->id;
            $client->save();
        }

        return redirect()->back();
    }
    public function delete_client(TelegramBot $bot, TelegramClient $client)
    {
        TelegramClient::whereId($client->id)->whereBotId($bot->id)->delete();
        return redirect()->back();
    }
    public function test_client(TelegramBot $bot, TelegramClient $client)
    {
        $telegram = new Api($bot->token);

        $telegram->sendMessage([
            'chat_id' => $client->id,
            'text' => $bot->name . ': Test message',
        ]);

        return redirect()->back()->with('status', 'Test message sent!');
    }
}
