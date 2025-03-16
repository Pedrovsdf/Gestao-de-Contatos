<?php
use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('contatos', ContatoController::class);
    Route::get('/contatos/filtrar/{status}', [ContatoController::class, 'index']);
});
Route::middleware('auth:sanctum')->post('/contatos', [ContatoController::class, 'store']);
Route::middleware('auth:sanctum')->get('/contatos/filtrar', [ContatoController::class, 'filtrar']);

