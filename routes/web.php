<?php

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome', [
        'users' => User::paginate(),
    ]);
    // return Inertia::render('Welcome');
});

Route::view('livewire', 'livewire');

Route::get('/sms', function () {
    Log::info('SMS received');

    return 'hit';
});

Route::post('/sms', function () {
    // Log::info('SMS received');
    Log::info('payload', request()->all());
    Log::info(request()->bearerToken());

    return 'hit';
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
