@extends('layouts.app')

    @section('content')
    <body>
        <?php
            if(isset($_SESSION['vazio'])){ // Se existir a sessão 'vazio' é carregado uma caixa de diálogo.
        ?>
        <!-- Modal: Componente não visto em aula -->
        <div class="modal fade" id="meuModal" tabindex="-1" role="dialog" aria-h6ledby="exampleModalh6" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalh6">Atenção!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-h6="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>Por favor, preencha todos os campos!</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
            unset($_SESSION['vazio']);
            }
        ?>

        <?php
            if(isset($_SESSION['adicionado'])){ // Se existir a sessão 'adicionado' é carregado uma caixa de diálogo.
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
                        <h6>Cliente adicionado com sucesso!</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
            unset($_SESSION['adicionado']);
            }
        ?>

        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark bg-dark">
                        <h4 style="color: white;">Cadastro de Clientes</h4>
                    </nav>
                </div>
            </div>
            <form method="post" action="{{ route('cliente_add') }}">
                @csrf
                <div class="form-group mt-5">
                    <h6>Nome Completo</h6>
                    <input type="text" class="form-control" name="nome" placeholder="Seu nome" required>
                </div>
                <div class="form-group">
                    <h6>Endereço</h6>
                    <input type="text" class="form-control" name="endereco" placeholder="Seu Endereço" required>
                </div>
                <div class="form-group">
                    <h6>CEP</h6>
                    <input type="text" class="form-control" name="cep" placeholder="CEP" required>
                </div>
                <div class="form-group">
                    <h6>Cidade</h6>
                    <input type="text" class="form-control" name="cidade" placeholder="Cidade" required>
                </div>
                <div class="form-group">
                    <h6>Estado</h6>
                    <select class="form-control" name="estado" type="text">
                        <option value="AC">Acre (AC)</option>
                        <option value="AL">Alagoas (AL)</option>
                        <option value="AP">Amapá (AP)</option>
                        <option value="AM">Amazonas (AM)</option>
                        <option value="BA">Bahia (BA)</option>
                        <option value="CE">Ceará (CE)</option>
                        <option value="DF">Distrito Federal (DF)</option>
                        <option value="ES">Espírito Santo (ES)</option>
                        <option value="GO">Goiás (GO)</option>
                        <option value="MA">Maranhão (MA)</option>
                        <option value="MT">Mato Grosso (MT)</option>
                        <option value="MS">Mato Grosso do Sul (MS)</option>
                        <option value="MG">Minas Gerais (MG)</option>
                        <option value="PA">Pará (PA)</option>
                        <option value="PB">Paraíba (PB)</option>
                        <option value="PR">Paraná (PR)</option>
                        <option value="PE">Pernambuco (PE)</option>
                        <option value="PI">Piauí (PI)</option>
                        <option value="RJ">Rio de Janeiro (RJ)</option>
                        <option value="RN">Rio Grande do Norte (RN)</option>
                        <option value="RS">Rio Grande do Sul (RS)</option>
                        <option value="RO">Rondônia (RO)</option>
                        <option value="RR">Roraima (RR)</option>
                        <option value="SC">Santa Catarina (SC)</option>
                        <option value="SP">São Paulo (SP)</option>
                        <option value="SE">Sergipe (SE)</option>
                        <option value="TO">Tocantins (TO)</option>
                    </select>
                </div>
                <div class="form-group">
                    <h6>Login</h6>
                    <input type="text" class="form-control" name="usuario" placeholder="Digite um usuário">
                </div>
                <div class="form-group">
                    <h6>Senha</h6>
                    <input type="password" class="form-control" name="senha" placeholder="Digite uma senha">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-secondary">Cadastrar</button>
                </div>
            </form>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">$(document).ready(function() { $('#meuModal').modal('show'); });</script>
    </body>
    @endsection