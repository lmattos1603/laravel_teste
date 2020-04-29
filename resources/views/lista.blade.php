@extends('template')

    @section('conteudo')
        <?php
            if(isset($_SESSION['excluido'])){ // Se existir a sessão 'adicionado' é carregado uma caixa de diálogo.
        ?>
        
        <div class="modal fade" id="meuModal" tabindex="-1" role="dialog" aria-h6ledby="exampleModalh6" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalh6">Sucesso!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-h6="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>Cliente excluído com sucesso!</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
            unset($_SESSION['excluido']);
            }
        ?>

        <table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">CEP</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Operações</th>
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
                <td><a href="{{ route('cliente_update', ['id' => $cli->id]) }}" class="btn btn-warning">Alterar</a> 
                    <a href="#" onclick="exclui({{ $cli->id }})" class="btn btn-danger">Excluir</a>
                    <a href="{{ route('vendas_cliente', ['id' => $cli->id]) }}" class="btn btn-info">Vendas</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            function exclui(id){
                if (confirm("Deseja excluir o cliente de id: "+id+"?")){
                    location.href = "/cliente/excluir/" + id;
                }
            }
        </script>
        <script type="text/javascript">$(document).ready(function() { $('#meuModal').modal('show'); });</script>
    @endsection