<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
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

Route::group([
    'middleware' => 'api',

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::get('/article', [ApiController::class, 'index']);
Route::get('article-id/{id}', [ApiController::class, 'show']);
Route::post('/create-article', [ApiController::class, 'store']);
Route::put('/update-article/{id}', [ApiController::class, 'update']);
Route::delete('/delete-article/{id}', [ApiController::class, 'destroy']);

Route::get('/image', [ImageController::class, 'index']);
Route::get('image-id/{id}', [ImageController::class, 'show']);
Route::post('/create-image', [ImageController::class, 'store']);
Route::put('/update-image/{id}', [ImageController::class, 'update']);
Route::delete('/delete-image/{id}', [ImageController::class, 'destroy']);

Route::get('/author', [AuthorController::class, 'index']);
Route::get('author/{id}', [AuthorController::class, 'show']);
Route::post('/create', [AuthorController::class, 'store']);
Route::put('/update/{id}', [AuthorController::class, 'update']);
Route::delete('/delete/{id}', [AuthorController::class, 'destroy']);
