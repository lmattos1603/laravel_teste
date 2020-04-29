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
        if(session()->has("usuario")){
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
        }else{
            return redirect()->route('login');
        }        
    }

    function telaCadastro(){
        if(session()->has("usuario")){
            $clientes = Cliente::all();
        
            return view("tela_cadastro_venda", [ "clis" => $clientes ]);
        }else{
            return redirect()->route('login');
        }
    }

    function listarVendas(){
        if(session()->has("usuario")){
            $vendas = Venda::all();
        
            return view("lista_vendas", [ "v" => $vendas ]);
        }else{
            return redirect()->route('login');
        }
    }

    function vendasPorCliente($id){
        if(session()->has("usuario")){
            $cliente = Cliente::find($id);
        
            return view("vendas_por_cliente", [ "cliente" => $cliente ]);
        }else{
            return redirect()->route('login');
        }
    }

    function listarProdutos($id){
        if(session()->has("usuario")){
            $vendas = Venda::find($id);
        
            return view("lista_produtos", [ "v" => $vendas ]);
        }else{
            return redirect()->route('login');
        }
    }

    function telaAdicionarItem($id){
        if(session()->has("usuario")){
            $vendas = Venda::find($id);
            $produtos = Produto::all();
        
            return view("tela_cadastro_itens", [ "vendas" => $vendas, "produtos" => $produtos ]);
        }else{
            return redirect()->route('login');
        }
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
