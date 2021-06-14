<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/routes', function (Request $request) {
    $routes = collect(Route::getRoutes())->map(function ($route) {
        return [
            'uri' => $route->uri,
            'as' => $route->action['as'] ?? '',
            'methods' => $route->methods,
            'action' => $route->action['uses'] ?? '',
            'middleware' => $route->action['middleware'] ?? [],
        ];
    });

    return response()->json($routes);
});
