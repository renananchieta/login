<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UsuariosController;
use App\Http\Controllers\Escolas\EscolasController;
use App\Http\Controllers\Estudantes\EstudantesController;
use App\Http\Controllers\Frequencia\FrequenciaController;
use App\Http\Controllers\TestController;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/autenticacao', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/usuario-info', [AuthController::class, 'info'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    // Segurança - Usuários
    Route::get('admin/usuarios/grid', [UsuariosController::class, 'grid']);
    Route::post('admin/usuario/store', [UsuariosController::class, 'store']); 
    
    //Estudantes
    Route::apiResource('estudantes', EstudantesController::class);
    Route::apiResource('escolas', EscolasController::class);
    Route::apiResource('frequencia', FrequenciaController::class);
    
});

Route::get('criar-hash', function () {
    $hashedPassword = Hash::make(12345678);
    return response($hashedPassword);
});