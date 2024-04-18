<?php

use Illuminate\Support\Facades\Route;
use Deminua\LaravelTgbot\Controllers\TelegramController;

Route::get('/', [TelegramController::class, 'index']);
Route::post('/', [TelegramController::class, 'store']);
Route::get('/edit/{bot}', [TelegramController::class, 'edit']);
Route::post('/edit/{bot}', [TelegramController::class, 'update']);
Route::post('/edit/{bot}/new_client', [TelegramController::class, 'new_client']);
Route::get('/edit/{bot}/delete_client/{client}', [TelegramController::class, 'delete_client']);
Route::get('/edit/{bot}/test_client/{client}', [TelegramController::class, 'test_client']);
