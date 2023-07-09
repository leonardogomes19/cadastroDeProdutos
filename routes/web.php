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
Route::view('/editar/{id}', 'editar')->name('editar');

/* Route::get('/', function () {
    return view('welcome');
});  */

//CRUD Produtos
Route::controller(ProdutosController::class)->group(function () {
    Route::get('/getProdutos', 'index'); //busca todos os produtos cadastrados
    Route::get('/getProdutos/{id}', 'produto'); //busca o produto determinado pelo id
    Route::post('/createProdutos', 'create'); //cadastra um novo produto
    Route::post('/editProdutos/{id}', 'edit'); //altera o produto determinado pelo id
    Route::post('/deleteProdutos/{id}', 'destroy'); //deleta o produto determinado pelo id
});

//API ViaCep
Route::controller(ApiViaCepController::class)->group(function () {
    Route::get('/viaCEP/{CEP}', 'getCEP');
});

