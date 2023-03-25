<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

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

Route::name('api.')->group(function() {
    Route::name('list')->get('/tasks', [TodoController::class, 'index']);
    Route::name('done')->patch('/tasks/done', [TodoController::class, 'update']);
    Route::name('store')->post('/tasks/store', [TodoController::class, 'store']);
});