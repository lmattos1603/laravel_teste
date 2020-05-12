@extends('layouts.app')

    @section('content')
    <?php
        session_start();
            if(isset($_SESSION['registrado'])){ 
        ?>
        
        <div class="alert alert-success" role="alert">
            Venda Cadastrada com Sucesso!
        </div>
        <?php
            unset($_SESSION['registrado']);
            }            
        ?>
        
        <table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Venda</th>
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data</th>
                <th scope="col">Operações</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($v as $vend)
            <tr>
                <td>{{ $vend->id }}</td>
                <td>{{ $vend->valor }}</td>
                <td>{{ $vend->descricao }}</td>
                <td>{{ $vend->cliente->nome }}</td>
                <td>{{ $vend->created_at }}</td>
                <td><a href = "{{ route('listar_produtos', ['id' => $vend->id]) }}" class="btn btn-info">Itens</a></td>
                <td><a href = "{{ route('cadastro_itens', ['id' => $vend->id]) }}" class="btn btn-success">Cadastrar Itens</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        
    @endsection