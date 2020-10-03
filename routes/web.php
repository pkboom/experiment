<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return Response::make('', 409, ['X-Inertia-Location' => $url]);
});

// asdfasdf
