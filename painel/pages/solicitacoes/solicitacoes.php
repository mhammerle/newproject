<script>
    function toogleActive() {
        document.getElementById("nav_solicitacoes").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Solicitações</h3>";
    }

    toogleActive();
</script>
<br>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Contato</title>
    <head>
<body>

<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Solicitações</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#" id="aguardando" onclick="aguardando()">Aguardando
                        Atendimento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="atendimento" onclick="atendimento()">Em atendimento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="encerrado" onclick="encerrado()">Encerradas</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-info my-2 my-sm-0" type="button" data-toggle="modal"
                        data-target="#ExemploModalCentralizado"><i class="ft-plus"></i>Nova Solicitação
                </button>
            </form>
        </div>
    </nav>


    <?php
    if (isset($_SESSION["sol_aberta"])) {
        if ($_SESSION["sol_aberta"] = 1) {
            echo " 
                    <div class='alert alert-success alert-dismissible fade show' role='alert' style='margin-top: 10px'>
                      Solicitação aberta com sucesso!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
            ";
        } else {
            echo "  <br><br>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      Ocorreu algum erro durante sua solicitação!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
            ";
        }

    }
    ?>


    <!-- Inicio Modal -->
    <div class="modal fade bd-example-modal-lg" id="ExemploModalCentralizado" tabindex="0" role="dialog"
         aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Nova Solicitação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-3">
                                    <form class="form form-horizontal form-bordered"
                                          action="app-assets/php/abrir_solicitacao.php" method="post">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-info"></i> Dados Pessoais</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control"
                                                               for="userinput1">Nome</label>
                                                        <div class="col-md-9">
                                                            <input readonly type="text" id="userinput1"
                                                                   class="form-control border-primary"
                                                                   placeholder="Nome" name="nome"
                                                                   value="<?php echo $_SESSION['nome_usr']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 label-control"
                                                               for="userinput2">Empresa</label>
                                                        <div class="col-md-8">
                                                            <input readonly type="text" id="userinput2"
                                                                   class="form-control border-primary"
                                                                   placeholder="Empresa" name="empresa"
                                                                   value="<?php echo $_SESSION['empresa_usr']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="form-section"><i class="ft-mail"></i> Solicitação</h4>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row last">
                                                        <div class="col-md-10">
                                                            <textarea id="userinput8" rows="6"
                                                                      class="form-control col-md-12 border-primary"
                                                                      name="solicitacao_txt"
                                                                      placeholder="Observações"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <form action="#" method="post" enctype="multipart/form-data">
                                                            <input type="file" name="importArquivo"><br><br>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Fechar
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Abrir
                                                            Solicitação
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Fim Modal -->
    <!-- Aguardando atendimento -->
    <div class="row" id="tb_aguardando" style="margin: 1px; margin-top: 9px; border:  1px solid gray; padding: 10px;">
        <div class="container">
            <header class='text-center'>
                <h4><span>Aguardando Atendimento</span></h4>
            </header>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col" class='text-center'>Solicitação</th>
                    <th scope="col" class='text-center'>Solicitante</th>
                    <th scope="col" class='text-center'>Data da Solicitação</th>
                    <th scope="col" class='text-center'>Solicitação</th>
                </tr>
                </thead>
                <tbody>
                <tbody>
                <?php include('app-assets/functions/get_sol_abertas.php'); ?>
                <?php
                $k = $i_sol_abertas;
                for ($i = 0; $i < $k; $i++) {
                    echo "<tr>
                                        <th scope='row'>" . $codigo_sol1[$i] . "</th>
                                        <td class='text-center'>" . ucwords(strtolower($solicitante1[$i])) . "</td>
                                        <td class='text-center'>" . $data_sol1[$i] . "</td>
                                        <td class='text-center'>" . $solicitacao1[$i] . "</td>                                        
                                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Aguardando atendimento -->

    <!-- EM atendimento -->
    <div class="row" id="tb_atendimento"
         style="display: none; margin: 1px; margin-top: 9px; border:  1px solid gray; padding: 10px;">
        <div class="container">
            <header class='text-center'>
                <h4><span>Em Atendimento</span></h4>
            </header>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col" class='text-center'>Solicitação</th>
                    <th scope="col" class='text-center'>Solicitante</th>
                    <th scope="col" class='text-center'>Data da Solicitação</th>
                    <th scope="col" class='text-center'>Solicitação</th>
                </tr>
                </thead>
                <tbody>
                <?php include('app-assets/functions/get_em_atendimento.php'); ?>
                <?php
                $k = $i_em_atendimento;
                for ($i = 0; $i < $k; $i++) {
                    echo "<tr>
                                        <th scope='row' class='text-center'>" . $codigo_sol2[$i] . "</th>
                                        <td class='text-center'>" . ucwords(strtolower($solicitante2[$i])) . "</td>
                                        <td class='text-center'>" . $data_sol2[$i] . "</td>
                                        <td class='text-center'>" . $solicitacao2[$i] . "</td>                                        
                                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- EM atendimento -->

    <!-- ENCERRADOS -->
    <div class="row" id="tb_encerrado"
         style="display: none; margin: 1px; margin-top: 9px; border:  1px solid gray; padding: 10px;">
        <div class="container">
            <header class='text-center'>
                <h4><span>Encerradas</span></h4>
            </header>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col" class='text-center'>Solicitação</th>
                    <th scope="col" class='text-center'>Solicitante</th>
                    <th scope="col" class='text-center'>Data da Solicitação</th>
                    <th scope="col" class='text-center'>Solicitação</th>
                    <th scope="col" class='text-center'>Data de Encerramento</th>
                </tr>
                </thead>
                <tbody>
                <?php include('app-assets/functions/get_encerradas.php'); ?>
                <?php
                $k = $i_encerradas;
                for ($i = 0; $i < $k; $i++) {
                    echo "<tr>
                                        <th scope='row' class='text-center'>" . $codigo_sol3[$i] . "</th>
                                        <td class='text-center'>" . ucwords(strtolower($solicitante3[$i])) . "</td>
                                        <td class='text-center'>" . $data_sol3[$i] . "</td>
                                        <td class='text-center'>" . $solicitacao3[$i] . "</td>   
                                        <td class='text-center'>" . $data_enc3[$i] . "</td>                                        
                                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ENCERRADOS -->

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que acionou o modal
        var recipient = button.data('whatever'); // Extrai informação dos atributos data-*
        // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
        // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
        var modal = $(this);
    })
</script>

<style type="text/css">
    body.modal-open div.modal-backdrop {
        z-index: -1;
        background-color: rgba(0, 0, 0, 0.5);

    }
</style>

<script>
    function aguardando() {
        document.getElementById("aguardando").classList.add("active");
        document.getElementById("atendimento").classList.remove("active");
        document.getElementById("encerrado").classList.remove("active");
        document.getElementById("tb_aguardando").style.display = "block";
        document.getElementById("tb_atendimento").style.display = "none";
        document.getElementById("tb_encerrado").style.display = "none";
    }

    function atendimento() {
        document.getElementById("aguardando").classList.remove("active");
        document.getElementById("atendimento").classList.add("active");
        document.getElementById("encerrado").classList.remove("active");
        document.getElementById("tb_aguardando").style.display = "none";
        document.getElementById("tb_atendimento").style.display = "block";
        document.getElementById("tb_encerrado").style.display = "none";
    }

    function encerrado() {
        document.getElementById("aguardando").classList.remove("active");
        document.getElementById("atendimento").classList.remove("active");
        document.getElementById("encerrado").classList.add("active");
        document.getElementById("tb_aguardando").style.display = "none";
        document.getElementById("tb_atendimento").style.display = "none";
        document.getElementById("tb_encerrado").style.display = "block";
    }


</script>

</body>
</html>
