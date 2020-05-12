@extends('layouts.app')

    @section('content')
    <body>

        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Cadastrar Venda</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('venda_add') }}">
                @csrf
                <div class="form-group mt-5">
                    <h6>Descrição</h6>
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição da Venda" required>
                </div>
                <div class="form-group">
                    <h6>Cliente</h6>
                    <select class="form-control" name="cliente" type="text">
                        @foreach ($clis as $cli)
                        <option value="{{ $cli->id }}">{{ $cli->nome }}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-secondary">Cadastrar</button>
                </div>
            </form>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    </body>
    @endsection