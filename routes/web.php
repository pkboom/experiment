<?php

use App\Http\Controllers\WelcomeController;

Route::post('/', [WelcomeController::class, 'index']);
