<?php

use App\Models\Cadastro;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', 'CadastroController@index');
Route::group(['prefix' => 'users'], function (){
    Route::post('add', 'CadastroController@add')->name('site.add');
    Route::get('edit/{id}','CadastroControler@edit');
    Route::post('update/{id}', 'CadastroControle@update');
    Route::delete('delete/{id}','CadastroControle@delete');
});




Route::fallback(function(){
    echo ' A rota acessada não existe. <a href="/">clique aqui</a> para retornar';
});


