<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebsiteController;
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

Route::prefix('website')->group(function () {
   Route::get('', [WebsiteController::class, 'index']);
});

Route::prefix('subscriber')->group(function() {
    Route::post('', [SubscriberController::class, 'store']);
});

Route::prefix('post')->group(function() {
    Route::post('', [PostController::class, 'store']);
});
