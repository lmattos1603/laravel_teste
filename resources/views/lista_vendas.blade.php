@extends('template')

    @section('conteudo')
        
        <table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Cliente</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($v as $vend)
            <tr>
                <td>{{ $vend->valor }}</td>
                <td>{{ $vend->descricao }}</td>
                <td>{{ $vend->cliente->nome }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('venda_cad') }}" class="btn btn-secondary">Voltar</a>
    @endsection