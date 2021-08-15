<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Experiment');
});

Route::get('messages', MessageController::class);
Route::get('users', [UserController::class, 'index']);
