<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;


class ClienteController extends Controller
{
    function telaAlteracao($id){
        if(session()->has("usuario")){
            $cliente = Cliente::find($id);

            return view("tela_alterar_cliente", [ "c" => $cliente ]);
        }else{
            return redirect()->route('login');
        }
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
        $usuario = $req->input('usuario');
        $senha = $req->input('senha');

        if($nome==null || $endereco==null || $cep==null || $cidade==null || $usuario==null || $senha==null){
            $_SESSION['vazio'] = "Vazio!";
            return view("tela_cadastro");
        }else{
            $cliente = new Cliente();
            $cliente->nome = $nome;
            $cliente->endereco = $endereco;
            $cliente->cep = $cep;
            $cliente->cidade = $cidade;
            $cliente->estado = $estado;
            $cliente->usuario = $usuario;
            $cliente->senha = $senha;

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
        if(session()->has("usuario")){
            $clientes = Cliente::all();
            return view("lista", [ "clis" => $clientes ]);
        }else{
            return redirect()->route('login');
        }
    }

    function alterar(Request $req, $id){
        if(session()->has("usuario")){
            $cliente = Cliente::find($id);
        

            $nome = $req->input('nome');
            $endereco = $req->input('endereco');
            $cep = $req->input('cep');
            $cidade = $req->input('cidade');
            $estado = $req->input('estado');
            $usuario = $req->input('usuario');
            $senha = $req->input('senha');

            
            $cliente->nome = $nome;
            $cliente->endereco = $endereco;
            $cliente->cep = $cep;
            $cliente->cidade = $cidade;
            $cliente->estado = $estado;
            $cliente->usuario = $usuario;
            $cliente->senha = $senha;

            if($cliente->save()){
                $msg = "Cliente $nome alterado com sucesso!";
                $_SESSION['alterado'] = "Alterado!";
            }else{
                $msg = "Cliente não foi alterado!";
            }

            return view("tela_alterar_cliente", [ "c" => $cliente ]);
        }else{
            return redirect()->route('login');
        }
    }

    function excluir($id){
        if(session()->has("usuario")){
            $cliente = Cliente::find($id);

            if($cliente->delete()){
                $msg = "Cliente excluído com sucesso!";
                $_SESSION['excluido'] = "Excluído!";
            }else{
                $msg = "Cliente não foi excluído!";
            }
            $clientes = Cliente::all();
            
            return view("lista", [ "clis" => $clientes ]);
        }else{
            return redirect()->route('login');
        }
    }

    function logar(){
        return view('tela_login');
    }

    function login(Request $req){
        $cliente = Cliente::all();

        $usuario = $req->input('usuario');
        $senha = $req->input('senha');

        $cliente = Cliente::where('usuario', '=', $usuario)->first();

        if($cliente and $cliente->senha == $senha){
            $variavel = [ 
                "usuario" => $usuario,
                "nome" => $cliente->nome 
            ];
            session($variavel);

            return redirect()->route('listar');
        }else{
            return redirect()->route('login');
        }
    }

    function logout(){
        session()->forget(["usuario", "nome"]);
        return view('tela_login');
    }
}


