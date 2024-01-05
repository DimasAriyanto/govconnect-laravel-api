<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\ProyekController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('check.jwt')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::delete('logout', [AuthController::class, 'logout']);

    Route::prefix('kontraktor')->group(function () {
        Route::post('/', [KontraktorController::class, 'create']);
        Route::get('/', [KontraktorController::class, 'getAll']);
        Route::get('/{id}', [KontraktorController::class, 'getOne']);
        Route::put('/{id}', [KontraktorController::class, 'update']);
        Route::delete('/{id}', [KontraktorController::class, 'delete']);
    });

    Route::prefix('proyek')->group(function () {
        Route::post('/', [ProyekController::class, 'create']);
        Route::get('/', [ProyekController::class, 'getAll']);
        Route::get('/{id}', [ProyekController::class, 'getOne']);
        Route::get('/kontraktor/{kontraktorId}', [ProyekController::class, 'getAllKontraktor']);
        Route::get('/', [ProyekController::class, 'search']);
        Route::put('/{id}', [ProyekController::class, 'update']);
        Route::delete('/{id}', [ProyekController::class, 'delete']);
    });
});
