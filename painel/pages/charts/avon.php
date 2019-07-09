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

<br>
<!-- [fim] Função que gera cores aleatórias -->
<div id="main_body">
<div class='row'>
    <div style="margin:1%; width: 48%">
        <div class='header col-md-12' style="background-color: white; border-radius: 8px;padding-bottom: 20px;">
            <div style="padding-top:10px;border-radius: 8px;">
                <p style="float: left; width: 90%">Qual é o perfil dos investimentos?</p>
                <div class="dropdown" style='float: right'>
                    <i class="ft-menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                    </i>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#ExemploModalCentralizado">Importar
                            dados</a>
                        <a class="dropdown-item" href="#">Exportar dados</a>
                        <a class="dropdown-item" href="pages/charts/models/axis_tipo_invest.csv" download>Exportar
                            modelo para importação</a>
                        <a class="dropdown-item" href="#" onClick="window.location.reload()">Atualizar Visualização</a>
                        <a class="dropdown-item" href="#">Ver em tela cheia</a>
                    </div>
                </div>
            </div>
            <hr>
            <div style="border: 2px solid #707070" id="perfil_investimentos"></div>
            <p style="float: right; font-size: 12px">Atualizado em [<?php echo $dt_import[0]; ?>]
                por <?php echo ucwords(strtolower($usr_import[0])); ?>.
            <p>
        </div>
    </div>
</div>
<!-- Inicio Modal -->
<div class="modal fade bd-example-modal-lg" id="ExemploModalCentralizado" tabindex="0" role="dialog"
     aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Importação de Arquivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="app-assets/php/import.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="importArquivo"><br><br>
                    <div class="form-group">
                        <label for="inputState">Qual relatório?</label>
                        <select id="inputState" class="form-control">
                            <option selected>Perfil dos investimentos</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar mudanças</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Fim Modal -->
<!-- [inicio] gráfico testebi -->
<script>
    google.charts.load('current', {'packages': ['corechart'], 'language': 'pt'});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Tipo de Ativo', 'Investimento'],
            <?php
            $k = $i_perfil_investimento;
            for($i = 0; $i < $k; $i++){
            ?>
            ['<?php echo $tipo_ativo[$i] ?>',<?php echo $investimento[$i] ?>],
            <?php
            }
            ?>
        ]);

        var options = {
            'width': '100%',
            'height': '100%',
            'backgroundColor': '#cfcfcf',
            'legend': 'left',
            'chartArea': {
                'left': '5%',
                'top': '5%',
                'right': '5%',
                'bottom': '5%',
                'width': '90%',
                'height': '90%',
            },

        };

        var chart = new google.visualization.PieChart(document.getElementById('perfil_investimentos'));

        chart.draw(data, options);
    }
</script>
<!-- [fim] gráfico de testebi -->
<!-- #END# Pie Chart -->
<!-- [início] Função que gera cores aleatórias -->
<script>
    function gera_cor() {
        var hexadecimais = '0123456789ABCDEF';
        var cor = '#';

        // Pega um número aleatório no array acima
        for (var i = 0; i < 6; i++) {
            //E concatena à variável cor
            cor += hexadecimais[Math.floor(Math.random() * 16)];
        }
        return cor;
    }
</script>

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que acionou o modal
        var recipient = button.data('whatever'); // Extrai informação dos atributos data-*
        // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
        // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
        var modal = $(this);
        modal.find('.modal-title').text('Nova mensagem para ' + recipient);
        modal.find('.modal-body input').val(recipient)
    })
</script>
<script>
    function setfilename(val) {
        var fileName = val().split('\\').pop();
        $('#inputGroupFile01').html(fileName);
    }
</script>


<style type="text/css">
    body.modal-open div.modal-backdrop {
        z-index: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>
</div>