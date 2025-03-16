<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ROTAS PÚBLICAS
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

// ROTAS PROTEGIDAS
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // CRUD de Contatos
    Route::apiResource('contatos', ContatoController::class);

    // Filtragem de Contatos
    Route::get('/contatos/filtrar', [ContatoController::class, 'filtrar']);
    Route::get('/contatos/filtrar/{status}', [ContatoController::class, 'index']);
});

// routes/api.php
Route::middleware('auth:sanctum')->get('/contatos/exportar', [ContatoController::class, 'exportarContatos']);
