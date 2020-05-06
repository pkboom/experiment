<?php

use App\Http\Controllers\WelcomeController;

Route::domain('app.experiment.test')->group(function () {
    Route::get('/', function () {
        return 'subdomain app';
    });
});

Route::domain('{account}.experiment.test')->group(function () {
    Route::get('/', function () {
        return 'subdomain accout';
    });
});

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/haha', function () {
    return 'haha';
});

Route::get('horizon/api', function () {});
Route::get('horizon/api/workload', function () {});
Route::get('horizon/api/masters', function () {});
Route::get('_debugbar/assets/stylesheets', function () {});
Route::get('_debugbar/telescope/{id} ', function () {});
