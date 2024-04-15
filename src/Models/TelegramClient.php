<?php

namespace Deminua\LaravelTgbot\Models;

use Illuminate\Database\Eloquent\Model;

class TelegramClient extends Model
{
    protected $table = 'telegram_clients';
    
    protected $fillable = [
        'id',
        'bot_id',
        'first_name',
        'username',
        'language_code',
    ];

    public function bot()
    {
        return $this->belongsTo(TelegramBot::class, 'bot_id');
    }
}
