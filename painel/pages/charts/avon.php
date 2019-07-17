<?php
$path_parts = pathinfo(__FILE__);
$_SESSION['nm_page'] = $path_parts['basename'];
include('app-assets/functions/restrito.php')
?>

<script>
    function toogleActive() {
        document.getElementById("nav_chart").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Relatórios em tempo real</h3>";
    }

    toogleActive();
</script>

<?php
    $_SESSION['dtInicialManutencao'] = '2010-01-01';
    $_SESSION['dtFinalManutencao'] = date('Y-m-d');
?>

<br>

<div id="main_body">
    <!-- VEICULOGRAMA -->
    <div class="row" matchHeight="card">
        <div class="col-xl-3 col-lg-3 col-12">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="px-3 py-3">
                        <div class="media">
                            <div class="media-body white text-left">
                                <h3><?php include('app-assets/functions/get_veiculos_ativos.php'); ?></h3>
                                <span>Veículos Ativos</span>
                            </div>
                            <div class="media-right align-self-center">
                                <i class="icon-check white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row text-center" matchHeight="card">
        <div class="col-xl-6 col-lg-6 col-12">
            <div class="card">
                <div class="card-title p-2">
                   <h4>Distribuição dos Veículos Ativos por Marca</h4><hr>
                </div>
                <div class="card-body">
                    <div class="px-3 py-3">
                        <div class="media">
                            <canvas id="divisao_marca"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-12">
            <div class="card">
                <div class="card-title p-2">
                    <h4>Distribuição dos Veículos Ativos por Ano Modelo</h4><hr>
                </div>
                <div class="card-body">
                    <div class="px-3 py-3">
                        <div class="media">
                            <canvas id="divisao_ano_modelo"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<hr>
<!-- MANUTENÇÃO -->
<div class="row" matchHeight="card">
    <div class="col-xl-3 col-lg-3 col-12">
        <div class="card bg-success">
            <div class="card-body">
                <div class="px-3 py-3">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 id="quantidade_os"><?php include('app-assets/functions/get_qnt_os.php'); ?></h3>
                            <span>Quantidade de OS</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="icon-eye white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-12">
        <div class="card bg-danger">
            <div class="card-body">
                <div class="px-3 py-3">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 id="valor_total_os"><?php include('app-assets/functions/get_valor_total_os.php'); ?></h3>
                            <span>Total Gasto</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="icon-diamond white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-12">
        <div class="card bg-warning">
            <div class="card-body">
                <div class="px-3 py-3">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3 id="valor_medio_os"><?php include('app-assets/functions/get_valor_medio_os.php'); ?></h3>
                            <span>Gasto médio por OS</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="icon-calculator white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-12 text-center">
        <div class="card-body" style="border: 1px solid burlywood">
        Abertura Inicial: <input type="date" id="dtInicialManutencao" name="dtInicialManutencao" value="2000-01-01"><br>
        Abertura Final: <input type="date" id="dtFinalManutencao" name="dtFinalManutencao"  value="<?php echo date('Y-m-d');?>">
        </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-12 text-center" >
        <button type="buttom" class="btn btn-success" id="btn_atualizar_graficos">Atualizar</button>
    </div>
</div>


<div class="row text-center" matchHeight="card">
    <div class="col-xl-6 col-lg-6 col-12">
        <div class="card">
            <div class="card-title p-2">
                <h4>Ordens de Serviço pelo Motivo da Parada</h4><hr>
            </div>
            <div class="card-body">
                <div class="px-3 py-3">
                    <div class="media" id="chart_place_divisao_status">
                        <canvas id="divisao_status"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-12">
        <div class="card">
            <div class="card-title p-2">
                <h4>Distribuição das Manutenções por Região</h4><hr>
            </div>
            <div class="card-body">
                <div class="px-3 py-3">
                    <div class="media">
                        <div id="distribuicao_municipio"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><br>
    <div class="row text-center" matchHeight="card">
        <div class="text-center col-12">
            <h4>Maiores Gastos com Manutenção</h4><hr>
        </div>
        <table class="table table-striped table-bordered default-ordering">
            <thead>
            <tr>
                <th>#</th>
                <th>Placa</th>
                <th>Preventiva</th>
                <th>Corretiva</th>
                <th>Sinistro</th>
                <th>Outros</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php include('app-assets/functions/get_placa_e_status.php');
            ?>
            <?php
            $k = $i_status_placa;
            for ($i = 0; $i < $k; $i++) {
                echo "<tr>
                                        <th scope='row'>" . ($i + 1) . "</th>
                                        <td>" . $placa[$i] . "</td>
                                        <td>" . $preventiva[$i] . "</td>
                                        <td>" . $corretiva[$i] . "</td>
                                        <td>" . $sinistro[$i] . "</td>
                                        <td>" . $outros[$i] . "</td>
                                        <td>" . $total[$i] . "</td>                                        
                                        </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript" src="app-assets/js/jquery.min.js"></script>
<script type="text/javascript" src="app-assets/js/charts.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
