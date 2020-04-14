<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;

class VendaController extends Controller
{
    function adicionar(Request $req){
        if(session()->has("usuario")){
            $valor = $req->input('valor');
            $descricao = $req->input('descricao');
            $cliente = $req->input('cliente');

            
            $venda = new Venda();
            $venda->valor = $valor;
            $venda->id_cliente = $cliente;
            $venda->descricao = $descricao;

            if($venda->save()){
                $msg = "Venda registrada com sucesso!";
                $_SESSION['registrado'] = "Adicionado!";
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

}
