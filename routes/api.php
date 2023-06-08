<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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
Route::post('login', [UsuarioController::class, 'login']);
Route::post('user/register', [UsuarioController::class, 'register']);

Route::middleware(['auth:api'])->group(function() {

    Route::post('task/register', [TaskController::class, 'register']);
    Route::get('task/get', [TaskController::class, 'get']);
    Route::get('task/get/{id}', [TaskController::class, 'getById']);
    Route::put('task/update', [TaskController::class, 'update']);
    Route::delete('task/delete/{id}', [TaskController::class, 'delete']);
    Route::post('logout', [UsuarioController::class, 'logout']);

});
