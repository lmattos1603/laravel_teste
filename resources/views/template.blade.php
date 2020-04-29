<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Cadastros</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php
            if(session()->has("usuario")){
        ?>
        <a class="navbar-brand" href="#">Programa</a>
        <?php
            }else{
        ?>
        <a class="navbar-brand" href="{{ route('login') }}">Programa</a>
        <?php
            }
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                    if(session()->has("usuario")){
                ?>
                <li class="nav-item">
                    <a class="nav-link">Olá, {{ session("nome") }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('venda_cad') }}">Cadastrar Venda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('listar') }}" value="Listar Clientes">Listar Clientes</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('listar_vendas') }}" class="nav-link" value="Listar Vendas">Listar Vendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produto_cad') }}">Cadastrar Produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
                
                <?php
                    }else{
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cliente_cad') }}">Cadastrar Clientes</a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @yield('conteudo')
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">$(document).ready(function() { $('#meuModal').modal('show'); });</script>
    </body>
</html>
