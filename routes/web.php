<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/2', function () {
    return Inertia::render('Welcome2');
});

Route::get('/3', function () {
    return Inertia::render('Welcome3');
});
Route::get('/4', function () {
    return Inertia::render('Welcome4');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('timer', fn () => Inertia::render('Timer'));
