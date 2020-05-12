@extends('layouts.app')

    @section('content')
    
        <h1>Vendas do cliente {{ $cliente->nome }}</h1>
        
        <table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id Venda</th>
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cliente->vendas as $vend)
            <tr>
                <td>{{ $vend->id }}</td>
                <td>{{ $vend->valor }}</td>
                <td>{{ $vend->descricao }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @if(count($cliente->vendas) == 0)
        <div class="alert alert-danger">Cliente não possui vendas!</div>
        @endif
        <a href="{{ route('listar') }}" class="btn btn-secondary">Voltar</a>
    @endsection