<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dump(User::first()->getRawOriginal());
});

Route::get('messages', MessageController::class);
Route::get('users', [UserController::class, 'index']);
