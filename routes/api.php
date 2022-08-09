<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;

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
// Route::get('teste', function () {
//     dd(public_path(), storage_path());
// });
Route::group(['middleware' => 'api'], function() {
    Route::get('/clientes', [CadastroController::class, 'index'])->name('listar.clientes');
    Route::get('/clientes/{id}', [CadastroController::class, 'getById'])->name('lista.cliente.x.id');
    Route::post('/clientes', [CadastroController::class, 'addClient'])->name('criar.cliente');
    Route::put('/clientes/{id}', [CadastroController::class, 'update'])->name('atualizar.cliente');
    Route::delete('/clientes/{id}', [CadastroController::class, 'destroy'])->name('deletar.cliente');
});

// Route::middleware('auth:sanctum')->get('/usuarios', function (Request $request) {
//     return $request->user();
// });
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register','register');
    Route::post('/logout', 'logout');
    Route::post('/refresh', 'refresh');


});

Route::controller(LoginController::class)->group(function(){
    Route::get('users', 'index');
    Route::post('users', 'store');
    Route::get('users/{id}', 'show');
    Route::put('users/{id}', 'update');
    Route::delete('/users/{id}', 'destroy');
});
