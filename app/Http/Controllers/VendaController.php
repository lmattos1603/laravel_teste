<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;
use App\Produto;

class VendaController extends Controller
{
    function adicionar(Request $req){
        #$valor = $req->input('valor');
        $descricao = $req->input('descricao');
        $cliente = $req->input('cliente');

        
        $venda = new Venda();
        $venda->valor = 0;
        $venda->id_cliente = $cliente;
        $venda->descricao = $descricao;

        if($venda->save()){
            $msg = "Venda registrada com sucesso!";
            $_SESSION['registrado'] = "Adicionado!";
            return redirect()->route('cadastro_itens', [ "id" => $venda->id ]);
        }else{
            $msg = "Venda não registrada!";
        }
        $clientes = Cliente::all();
        return view("tela_cadastro_venda", ["clis" => $clientes]);       
    }

    function telaCadastro(){
        $clientes = Cliente::all();
    
        return view("tela_cadastro_venda", [ "clis" => $clientes ]);
    }

    function listarVendas(){
        $vendas = Venda::all();
    
        return view("lista_vendas", [ "v" => $vendas ]);
    }

    function vendasPorCliente($id){
        $cliente = Cliente::find($id);
    
        return view("vendas_por_cliente", [ "cliente" => $cliente ]);
    }

    function listarProdutos($id){
        $vendas = Venda::find($id);
    
        return view("lista_produtos", [ "v" => $vendas ]);
    }

    function telaAdicionarItem($id){
        $vendas = Venda::find($id);
        $produtos = Produto::all();
    
        return view("tela_cadastro_itens", [ "vendas" => $vendas, "produtos" => $produtos ]);
    }

    function adicionarItem(Request $req, $id){
        $id_produto = $req->input('id_produto');
        $quantidade = $req->input('quantidade');
        $subtotal = 0;

        $produto = Produto::find($id_produto);
        $venda = Venda::find($id);
        $subtotal = $produto->preco * $quantidade;

        $colunas_pivot = [
            'quantidade' => $quantidade,
            'subtotal' => $subtotal
        ];

        $venda->produtos()->attach($id_produto, $colunas_pivot);
        $venda->valor += $subtotal;
        $venda->save();

        return redirect()->route('cadastro_itens', [ "id" => $venda->id ]);
    }

    function excluirItem($id_pivot, $id){
        $venda = Venda::find($id);
        $subtotal = 0;

        foreach($venda->produtos as $vp){
            if($vp->pivot->id == $id_pivot){
                $subtotal = $vp->pivot->subtotal;
            break;
            }
        }
        $venda->valor = $venda->valor - $subtotal;
        $venda->produtos()->wherePivot('id', '=', $id_pivot)->detach();
        $venda->save();

        return redirect()->route('cadastro_itens', [ "id" => $venda->id ]);
    }
}
