<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dump(User::first()->getRawOriginal());
});

Route::get('messages', MessageController::class);
Route::get('users', [UserController::class, 'index']);

Route::get('webhook', function () {
    Log::info(Request::all());
});
