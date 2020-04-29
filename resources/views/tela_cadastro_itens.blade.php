@extends('template')

    @section('conteudo')

<body>

        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Cadastrar Itens Venda #{{ $vendas->id }}</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('add_itens', [ 'id' => $vendas->id ]) }}">
                @csrf
                <div class="form-group mt-5">
                    <h6>Produto</h6>
                    <select class="form-control" name="id_produto" type="text">
                        @foreach ($produtos as $p)
                        <option value="{{ $p->id }}">{{ $p->nome }}</option>
                        @endforeach
                    </select>
                    <h6>Quantidade</h6>
                    <input type="number" name="quantidade" class="form-control" min="0" step="0.01">
                </div>
                <div class="col-md-6 ">
                    <button type="submit" class="btn btn-secondary">Cadastrar</button>
                </div>
            </form>
            <h2>Produtos Adicionados</h2>
            <table class="table table-striped mt-5">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor unitário</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data</th>
                    <th scope="col">Operação</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($vendas->produtos as $p)
                <tr>
                    <td>{{ $p->pivot->id }}</td>
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->preco }}</td>
                    <td>{{ $p->pivot->quantidade }}</td>
                    <td>{{ $p->pivot->subtotal }}</td>
                    <td>{{ $vendas->descricao }}</td>
                    <td>{{ $vendas->created_at }}</td>
                    <td><a href="#" class="btn btn-danger" onclick="exclui({{ $p->pivot->id }})">Remover</a></td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td><b>Total</b></td>
                    <td></td>
                    <td></td>
                    <td><b>{{ $vendas->valor }}</b></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <script>
            function exclui(id){
                if (confirm("Deseja excluir o item de id: "+id+"?")){
                    location.href = "/venda/{{ $vendas->id }}/remover_itens/" + id;
                }
            }
        </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    </body>
@endsection