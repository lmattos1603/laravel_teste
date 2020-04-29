@extends('template')

    @section('conteudo')
    <h3>Venda #{{ $v->id }}</h3>
    <table class="table table-striped mt-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Produto</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor unitário</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($v->produtos as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>{{ $p->preco }}</td>
            <td>{{ $p->pivot->quantidade }}</td>
            <td>{{ $p->pivot->subtotal }}</td>
            <td>{{ $v->descricao }}</td>
            <td>{{ $v->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
        
    @endsection