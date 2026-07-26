<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UrlController::class, 'index']);
Route::post('/shorten', [UrlController::class, 'shorten']);
Route::get('/{code}', [UrlController::class, 'redirect'])
    ->where('code', '[a-zA-Z0-9]{6}')
    ->name('redirect');
