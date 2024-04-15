<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('telegram_clients', function (Blueprint $table) {
            $table->string('id');
            $table->bigInteger('bot_id');
            $table->string('first_name')->nullable();
            $table->string('username')->nullable();
            $table->string('language_code')->nullable();
            $table->timestamps();

            $table->index('id');
            $table->index('bot_id');
        });

        Schema::create('telegram_bots', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('token')->unique();
            $table->mediumText('webhook_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telegram_clients');
        Schema::dropIfExists('telegram_bots');
    }
};
