<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo;
use App\Produto;

class ProdutoController extends Controller
{
    function telaCadastroProduto(){
        $tipo = Tipo::all();

        return view('tela_cadastro_produto', ['t' => $tipo]);
    }

    function cadastroProduto(Request $req){
        $nome = $req->input('nome');
        $preco = $req->input('preco');
        $tipo = $req->input('tipo');

        
        $produto = new Produto();
        $produto->nome = $nome;
        $produto->preco = $preco;
        $produto->id_tipo = $tipo;

        if($produto->save()){
            $msg = "Produto registrado com sucesso!";
            return redirect()->route('produto_cad');
        }else{
            $msg = "Produto não registrado!";
        }
    }
}
