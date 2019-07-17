<script>
    function toogleActive() {
        document.getElementById("nav_home").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Log de acesso</h3>";
    }

    toogleActive();
</script>
<div id="main_body">
<section id="ordering">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Acesso ao Painel</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <p class="card-text">Monstrando os últimos 20 acessos ao seu painel.</p>
                        <table class="table table-striped table-bordered default-ordering">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome do Usuário</th>
                                <th>Data e horário</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php include('app-assets/functions/controle_acesso.php');
                            ?>
                            <?php
                            $k = $i_status_placa;
                            for ($i = 0; $i < $k; $i++) {
                                echo "<tr>
                                        <th scope='row'>" . ($i + 1) . "</th>
                                        <td>" . $nome_usu[$i] . "</td>
                                        <td>" . $data_acesso[$i] . "</td></tr>";
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nome do Usuário</th>
                                <th>Data e horário</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>