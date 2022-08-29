<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // dump(Request::query('asdf'));
    if (Request::query('request-context') === 'content-manager') {
        dump('manager');
    }

    return 'asdf';
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('timer', function () {
    return inertia::render('Timer');
});
