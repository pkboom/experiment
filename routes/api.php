<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Spatie\PdfToImage\Pdf;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('deviceRenderingContent/{uuid}', function () {
    $uuid = Str::uuid();

    $path = storage_path("{$uuid}.jpeg");

    $pdf = new Pdf(request()->file('image')->getPathName());

    $pdf->saveImage($path);

    return response()->json([
        'uuid' => $uuid,
    ]);
    // $deviceRendering->saveImage($path);

});
