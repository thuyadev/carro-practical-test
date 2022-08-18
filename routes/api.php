<?php

use Illuminate\Http\Request;
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

Route::post('register', [\App\Http\Controllers\Api\V1\User\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\V1\User\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('logout', [\App\Http\Controllers\Api\V1\User\AuthController::class, 'logout']);

    Route::apiResource('contact-forms', \App\Http\Controllers\Api\V1\ContactForm\ContactFormController::class);

    Route::post('contact-users', [\App\Http\Controllers\Api\V1\ContactUser\ContactUserController::class, 'store']);
});
