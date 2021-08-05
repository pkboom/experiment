<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('images/{image}', function ($image) {
    dump($image);

    dump(Request::all());
});
