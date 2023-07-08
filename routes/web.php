<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiViaCepController;
use App\Http\Controllers\ProdutosController;

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

//tela inicial
Route::get('/', 'App\Http\Controllers\ProdutosController@index')->name('produtos.index');

//tela de cadastro
Route::view('/cadastro', 'cadastro')->name('cadastro');

//tela de editar
Route::view('/editar', 'editar')->name('editar');

/* Route::get('/', function () {
    return view('welcome');
});  */

//CRUD Produtos
Route::controller(ProdutosController::class)->group(function () {
    Route::get('/getProdutos', 'index');
    Route::post('/createProdutos', 'create');
    Route::post('/editProdutos', 'edit');
    Route::post('/deleteProdutos', 'destroy');
});

Route::controller(ApiViaCepController::class)->group(function () {
    Route::get('/viaCEP/{CEP}', 'getCEP');
});

