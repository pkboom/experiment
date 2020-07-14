<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;

Route::post('payment', [PaymentController::class, 'create']);

Route::get('checkout', [CheckoutController::class, 'create'])
    ->name('checkout');
