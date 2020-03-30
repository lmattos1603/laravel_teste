<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de Clientes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <nav class="navbar navbar-dark bg-dark">
                    <h4 style="color: white;">Lista de Clientes</h4>
                </nav>
                <table class="table mt-3">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($clis as $cli)
                    <tr>
                        <td>{{ $cli->nome }}</td>
                        <td>{{ $cli->endereco }}</td>
                        <td>{{ $cli->cep }}</td>
                        <td>{{ $cli->cidade }}</td>
                        <td>{{ $cli->estado }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="cadastro" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
    <script type="text/javascript">$(document).ready(function() { $('#meuModal').modal('show'); });
    </body>
</html> 