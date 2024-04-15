<?php

namespace Deminua\LaravelTgbot\Models;

use Illuminate\Database\Eloquent\Model;

class TelegramBot extends Model
{
    protected $table = 'telegram_bots';
    
    protected $fillable = [
        'name',
        'token',
        'certificate_path',
        'webhook_url',
        'allowed_updates',
    ];

    public function clients()
    {
        return $this->hasMany(TelegramClient::class, 'bot_id');
    }

}
