<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ordenController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/obtener',[ordenController::class,'mostrarOrdenes']);
Route::post('/insertar',[ordenController::class,'insertarOrden']);

Route::get('/detalle',[ordenController::class, 'obtenerDetalle']);

Route::put('/editar',[ordenController::class,'editarOrden']);

Route::delete('/eliminar',[ordenController::class,'eliminarOrden']);