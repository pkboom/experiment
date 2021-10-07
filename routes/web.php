<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    dump(User::all());

    return Inertia::render('Experiment');
});

Route::get('messages', MessageController::class)
    ->name('messages');

Route::get('users', [UserController::class, 'index']);
