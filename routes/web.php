<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function (Request $request) {
    return Inertia::render('Experiment');
});

Route::get('asdf', function (Request $request) {
    return Inertia::render('Experiment');
});
