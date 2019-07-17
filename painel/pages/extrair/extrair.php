<?php ob_start(); ?>

<script>
    function toogleActive() {
        document.getElementById("nav_extrair").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Extração de Bases</h3>";
    }
    toogleActive();

window.onload = function() {
  document.getElementById("texto_procuradov").focus();
};

</script>
<br>
<div id="main_body">
    <div id="divExtrair">
    <div class="row">        
        <div class="col-2 text-center">
            <button class="btn btn-success btn-block" onclick="selectType('veiculograma')">VEICULOGRAMA</button>
        </div>
        <div class="col-2 text-center">
            <button class="btn btn-success btn-block" onclick="selectType('manutencao')">MANUTENÇÃO</button>
        </div>
        <div class="col-2 text-center">
            <button class="btn btn-success btn-block">MULTAS</button>
        </div>
        <div class="col-2 text-center">
            <button class="btn btn-success btn-block">LOCAÇÃO</button>
        </div>
        <div class="input-group col-4">
            <div class="input-group-prepend">
                <span class="input-group-text">Procure pela TAG</span>
            </div>
            <input id="texto_procuradov" type="text" class="form-control" aria-label="With textarea"
                   onkeyup="filtrar_tags('texto_procuradov','tags_box','tag_veiculograma')"
                   onkeypress="filtrar_tags('texto_procuradov','tags_box','tag_veiculograma')">
        </div>
    </div>
    <div class="row">
        <div class="col-2 text-center" id="action_box"><br>
        <h3>Ações</h3><hr>
         <div id="mods" class="dropdown text-center">
                    <button class="btn btn-primary dropdown-toggle btn text-center" type="button"
                            id="templates_v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title='Selecione um dos modelos pré-elaborados.'>
                        Templates
                    </button>
                    <div class="dropdown-menu btn-block text-center" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" onclick="selectType('veiculograma')"
                       id="veiculograma">Veiculograma</a>
                    <a class="dropdown-item" href="#" onclick="selectType('manutencao')" id="manutencao">Manutenção</a>
                    <a class="dropdown-item" href="#" onclick="selectType('locacao')" id="locacao">Locação</a>
                    <a class="dropdown-item" href="#" onclick="selectType('multas')" id="multas">Multas</a>
                </div>
            </div>
            <div id="btnRecovery" title='Selecione um dos últimos relatórios gerados.'>
                <div class="row">
                    <div class="col-8">
                        <h6>Últimos<br>Relatórios</h6>
                    </div>
                    <div class="col-4">
                        <a href'#'><i class='ft-clock font-large-1'></i></a>
                    </div>
                </div>
            </div>
            <div id="btnExtrair">
                <div class="row">
                    <div class="col-8">
                        <h6>Gerar<br>Relatório</h6>
                    </div>
                    <div class="col-4">
                        <a href'#'><i class='ft-download font-large-1'></i></a>
                    </div>
                </div>
            </div>
            <div id="btnLimpar">
                <div class="row">
                    <div class="col-8">
                        <h6>Limpar<br>Seleção</h6>
                    </div>
                    <div class="col-4">
                        <a href'#'><i class='ft-trash font-large-1'></i></a>
                    </div>
                </div>
            </div>


        </div>
        <!--VEICULOGRAMA-->
        <div class="col-10 text-center tags_box" id="div_veiculograma"><br>
            <div>
            <h3>Selecione as Tags que você deseja incluir no relatório.</h3><hr>
            </div>
            <div id="div_tags">
            <?php
            include('app-assets/functions/get_tables_name_veiculograma.php');
            $k = $i_veiculograma;
            for ($i = 0; $i < $k; $i++) {
                echo "
               <button class='btn btn-secundary btn-sm tag_veiculograma' id='$coluna_veiculograma[$i]' onclick='activeBtn(".'"'.$coluna_veiculograma[$i].'"'.")'>$coluna_veiculograma[$i]</button>";
            }
            ?>
            </div>
        </div>
        <!--MANUTENÇÃO-->
        <div class="col-10 text-center" id="div_manutencao">
            <div id="titulo_tag">
            <h3>Selecione as Tags que você deseja incluir no relatório.</h3><hr>
            </div>
            <div id="div_tags">
            <?php
            include('app-assets/functions/get_tables_name_manutencao.php');
            $k = $i_manutencao;
            for ($i = 0; $i < $k; $i++) {
                echo "
               <button class='btn btn-secundary btn-sm tag_veiculograma' id='$coluna_manutencao[$i]' onclick='activeBtn(".'"'.$coluna_manutencao[$i].'"'.")'>$coluna_manutencao[$i]</button>";
            }
            ?>
            </div>
        </div>
        <!--LOCAÇÃO-->
        <div class="col-10 text-center" id="div_locacao">
            <h3>Selecione as Tags que você deseja incluir no relatório.</h3><hr>
            <?php
            include('app-assets/functions/get_tables_name_manutencao.php');
            $k = $i_manutencao;
            for ($i = 0; $i < $k; $i++) {
                echo "
               <button class='btn btn-secundary btn-sm tag_veiculograma' id='$coluna_manutencao[$i]' onclick='activeBtn(".'"'.$coluna_manutencao[$i].'"'.")'>$coluna_manutencao[$i]</button>";
            }
            ?>
        </div>
        <!--MULTAS-->
        <div class="col-10 text-center" id="div_multas">
            <h3>Selecione as Tags que você deseja incluir no relatório.</h3><hr>
            <div>
            <?php
            include('app-assets/functions/get_tables_name_manutencao.php');
            $k = $i_manutencao;
            for ($i = 0; $i < $k; $i++) {
                echo "
               <button class='btn btn-secundary btn-sm tag_veiculograma' id='$coluna_manutencao[$i]' onclick='activeBtn(".'"'.$coluna_manutencao[$i].'"'.")'>$coluna_manutencao[$i]</button>";
            }
            ?>
            </div>
        </div>
    </div>
</div>
</div>



<form id="extractSQL"  class="col-md-6 col-lg-6 col-sm-12" action="app-assets/functions/extrair_relatorio.php" method="post">
    <div class="text-center col-12" id="div3">

        <div id='div2' ondrop='drop(event)' ondragover='allowDrop(event)'></div>


    </div>
    <input type="text" id="querySQL" name="querySQL">
    <input type="text" id="name_xls" name="name_xls">
    <div id="divButttons" class="text-center">
        <!--<button type="button" class="btn btn-secondary btn-lg" onclick="window.location.reload();">Limpar
            Seleção</button>
        <button type="submit" class="btn btn-success btn-lg">Extrair Relatório</button>-->
    </div>

</form>

<div id="query"> union all select
    <text id="select"></text>
    <text id="from"></text>
    <text id="where"></text>
</div>
<div id="query_dual">select
    <text id="select_dual"></text>
    <text> from dual</text>
</div>
</div>