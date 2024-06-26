<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Register'));

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// });
