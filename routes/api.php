<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/api/add', 'CadastroController@add')->name('site.add');


Route::get('/clientes', [CadastroController::class, 'index'])->name('listar.clientes');
Route::get('/clientes/{id}', [CadastroController::class, 'getById'])->name('lista.cliente.x.id');
Route::post('/clientes', [CadastroController::class, 'addClient'])->name('criar.cliente');
Route::put('/clientes/{id}', [CadastroController::class, 'update'])->name('atualizar.cliente');
Route::delete('/clientes/{id}', [CadastroController::class, 'delete'])->name('deletar.cliente');
