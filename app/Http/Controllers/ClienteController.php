<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;


class ClienteController extends Controller
{
    function telaAlteracao($id){
        $cliente = Cliente::find($id);

        return view("tela_alterar_cliente", [ "c" => $cliente ]);
    }

    function telaCadastro(){
        return view("tela_cadastro");
    }

    function adicionar(Request $req){
        $nome = $req->input('nome');
        $endereco = $req->input('endereco');
        $cep = $req->input('cep');
        $cidade = $req->input('cidade');
        $estado = $req->input('estado');

        if($nome==null || $endereco==null || $cep==null || $cidade==null){
            $_SESSION['vazio'] = "Vazio!";
            return view("tela_cadastro");
        }else{
            $cliente = new Cliente();
            $cliente->nome = $nome;
            $cliente->endereco = $endereco;
            $cliente->cep = $cep;
            $cliente->cidade = $cidade;
            $cliente->estado = $estado;

            if($cliente->save()){
                $msg = "Cliente $nome adicionado com sucesso!";
                $_SESSION['adicionado'] = "Adicionado!";
            }else{
                $msg = "Cliente não foi adicionado!";
            }

            return view("tela_cadastro", ["mensagem" => $msg]);
        }
    }

    function listar(){
        $clientes = Cliente::all();
        
        return view("lista", [ "clis" => $clientes ]);
        
    }

    function alterar(Request $req, $id){
        $cliente = Cliente::find($id);
        

        $nome = $req->input('nome');
        $endereco = $req->input('endereco');
        $cep = $req->input('cep');
        $cidade = $req->input('cidade');
        $estado = $req->input('estado');

        
        $cliente->nome = $nome;
        $cliente->endereco = $endereco;
        $cliente->cep = $cep;
        $cliente->cidade = $cidade;
        $cliente->estado = $estado;

        if($cliente->save()){
            $msg = "Cliente $nome alterado com sucesso!";
            $_SESSION['alterado'] = "Alterado!";
        }else{
            $msg = "Cliente não foi alterado!";
        }

        return view("tela_alterar_cliente", [ "c" => $cliente ]);
    }

    function excluir($id){
        $cliente = Cliente::find($id);

        if($cliente->delete()){
            $msg = "Cliente excluído com sucesso!";
            $_SESSION['excluido'] = "Excluído!";
        }else{
            $msg = "Cliente não foi excluído!";
        }
        $clientes = Cliente::all();
        
        return view("lista", [ "clis" => $clientes ]);
    }
}
