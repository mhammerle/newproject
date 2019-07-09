<script>
    function toogleActive() {
        document.getElementById("nav_home").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Perfil do Usuário</h3>";
    }

    toogleActive();
</script>
<div id="main_body">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls">Dados do Usuário</h4>
                <p class="mb-0">Atualize seus dados abaixo.</p>
            </div>
            <div class="card-body">
                <div class="px-3">
                    <form class="form form-horizontal form-bordered" action="app-assets/php/update.php" method="post">
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-info"></i> Dados Pessoais</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Nome</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput1" class="form-control border-primary"
                                                   placeholder="Nome" name="nome"
                                                   value="<?php echo $_SESSION['nome_usr']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput2">Empresa</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput2" class="form-control border-primary"
                                                   placeholder="Empresa" name="empresa"
                                                   value="<?php echo $_SESSION['empresa_usr']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row last">
                                        <label class="col-md-3 label-control" for="userinput3">Usuário</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput3" class="form-control border-primary"
                                                   placeholder="Usuário" name="usuario"
                                                   value="<?php echo $_SESSION['usuario_usr']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row last">
                                        <label class="col-md-3 label-control" for="userinput4">Senha</label>
                                        <div class="col-md-9">
                                            <input type="password" id="userinput4" class="form-control border-primary"
                                                   placeholder="Senha" name="senha"
                                                   value="<?php echo $_SESSION['senha_usr']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-section"><i class="ft-mail"></i> Dados de Contato</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput5">Email</label>
                                        <div class="col-md-9">
                                            <input class="form-control border-primary" type="email" placeholder="Email"
                                                   name="email" value="<?php echo $_SESSION['email_usr']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row last">
                                        <label class="col-md-3 label-control">Telefone</label>
                                        <div class="col-md-9">
                                            <input class="form-control border-primary" type="tel"
                                                   placeholder="Telefone de Contato" name="telefone"
                                                   value="<?php echo $_SESSION['telefone_usr']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row last">
                                        <label class="col-md-3 label-control" for="userinput8">Obs.</label>
                                        <div class="col-md-9">
                                            <textarea id="userinput8" rows="6"
                                                      class="form-control col-md-9 border-primary" name="observacao"
                                                      placeholder="Observações"> <?php echo $_SESSION['observacao_usr']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions right">
                            <button type="button" class="btn btn-raised btn-warning mr-1">
                                <i class="ft-x"></i> Cancelar
                            </button>
                            <button type="submit" class="btn btn-raised btn-primary">
                                <i class="fa fa-check-square-o"></i> Salvar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>                    
</div>