<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('webhook', function () {
    Log::info(Request::header('X-Hub-Signature'));
    Log::info(Request::header('x-hub-signature-256'));
    Log::info(Request::getContent());

    $signatureData = explode('=', Request::header('x-hub-signature'));
    $hash1 = hash_hmac('sha1', Request::getContent(), 'my-secret');
    $resultHash1 = hash_equals($signatureData[1], $hash1);
    Log::info($resultHash1);
    

    $signatureData = explode('=', Request::header('x-hub-signature-256'));
    $hash256 = hash_hmac('sha256', Request::getContent(), 'my-secret');
    $resultHash256 = hash_equals($signatureData[1], $hash256);
    Log::info($resultHash256);
});
