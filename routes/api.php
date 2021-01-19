<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorias', [CategoriaController::class, 'indexJson']);

Route::get('/produtos', [ProdutoController::class, 'indexJson']);
Route::post('/produtos', [ProdutoController::class, 'storeJson']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroyJson']);
Route::put('/produtos/{id}', [ProdutoController::class, 'updatejson']);
Route::patch('/produtos/{id}', [ProdutoController::class, 'updatejson']);
Route::get('/produtos/{id}', [ProdutoController::class, 'showJson']);







