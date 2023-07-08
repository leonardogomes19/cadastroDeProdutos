<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ProdutosController extends Controller
{
    /* ROTAS PARA OUTRAS TELAS */

        //renderizar tela de cadastro
        public function telaCadastro()
        {
            return View::make('telaCadastro.Cadastro');
        }

        //renderizar tela de editar
        public function telaEditar()
        {
            return View::make('telaEditar.Editar');
        }

    /* FIM DAS ROTAS */

    
    //retorna todos os produtos cadastrados
    public function index()
    {
        try {
            $produtos = Produtos::orderByDesc('id')->get();

            return view('welcome', compact('produtos'));
            //return $produtos;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    //cadastra um novo produto
    public function create(Request $request)
    {
        try {
            //validação dos campos vindos do request
            $validate = Validator::make($request->all(), [
                'CEP' => 'required|string',
                'codigoID' => 'required|string',
                'linkImg' => 'required|string',
                'nome' => 'required|string',
                'preco' => 'required|numeric',

            ]);

            $validate = $validate->validated();

            $create = Produtos::create($validate);
            return ['status' => true, 'data' => $create];
        } catch (\Throwable $th) {
            return ['status' => false, 'errors' => [$th->getMessage(), $th->getLine()]];
        }
    }

    //altera dados do produto 
    public function edit($id, Request $request)
    {
        try {
            $produto = Produtos::find($id);
            $produto->codigoId = $request->post('codigoId');
            $produto->nome = $request->post('nome');
            $produto->linkImg = $request->post('linkImg');
            $produto->preco = $request->post('preco');
            $produto->CEP = $request->post('CEP');
            $produto->save();
            
        } catch (\Throwable $th) {
            return $th;
        }
    }

    //deleta produto
    public function destroy($id)
    {
        //
        try {
            $produto = Produtos::find($id);
            $produto->delete();
        } catch (\Throwable $th) {
            return $th;
        }
    }

}
