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

Route::post('register', [App\Http\Controllers\API\v1\RegisterController::class, 'register']);
Route::post('login', [App\Http\Controllers\API\v1\LoginController::class, 'login']);

Route::get('get-categories', [App\Http\Controllers\API\v1\CategoryController::class, 'getCategories']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user-info', [App\Http\Controllers\API\v1\UserController::class, 'getInfo']);
    Route::post('edit-profile', [App\Http\Controllers\API\v1\UserController::class, 'editProfile']);
});
