<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
| Aqui é onde você pode registrar rotas de API para seu aplicativo. Esses
| rotas são carregadas pelo RouteServiceProvider e todas elas serão
| ser atribuído ao grupo de middleware "api". Faça algo ótimo!
|
*/

Route::get('/usuarios', [UserController::class, 'index']);
Route::post('/usuarios', [UserController::class, 'store']);
Route::get('/usuarios/{id}', [UserController::class, 'show']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);
Route::delete('usuarios/{id}', [UserController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
