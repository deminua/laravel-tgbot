<?php

use Illuminate\Support\Facades\Route;
use Deminua\LaravelTgbot\Controllers\TelegramController;

Route::get('/', [TelegramController::class, 'index'])->name('index');
Route::post('/', [TelegramController::class, 'store'])->name('store');
Route::get('/edit/{bot}', [TelegramController::class, 'edit'])->name('edit');
Route::post('/edit/{bot}', [TelegramController::class, 'update'])->name('update');
Route::post('/edit/{bot}/new_client', [TelegramController::class, 'new_client'])->name('new_client');
Route::get('/edit/{bot}/delete_client/{client}', [TelegramController::class, 'delete_client'])->name('delete_client');
Route::get('/edit/{bot}/test_client/{client}', [TelegramController::class, 'test_client'])->name('test_client');
