<script>
    function toogleActive() {
        document.getElementById("nav_extrair").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Extração de Bases</h3>";
    }

    toogleActive();
</script>

<br>
<div class="dropdown text-center">
  <button class="btn btn-secondary dropdown-toggle btn-lg btn-block text-center" type="button" id="dropdownMenuButtonModulo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Escolha o módulo
</button>
  <div class="dropdown-menu btn-block text-center" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#" onclick="selectType('veiculograma')" id="veiculograma">Veiculograma</a>
    <a class="dropdown-item" href="#" onclick="selectType('manutencao')" id="manutencao">Manutenção</a>
    <a class="dropdown-item" href="#" onclick="selectType('locacao')" id="locacao">Locação</a>
    <a class="dropdown-item" href="#" onclick="selectType('multas')" id="multas">Multas</a>
  </div>
</div>

<div class="text-center" id="div_veiculograma" ondrop="drop(event)" ondragover="allowDrop(event)">
  <span>Arraste para o quadro ao lado os itens que você deseja inserir no relatório</span>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Procure pela TAG</span>
        </div>
        <input id="texto_procurado" type="text" class="form-control" aria-label="With textarea" onkeyup="filtrar_tags()">
    </div>

    <hr>
    <?php
    include('app-assets/functions/get_tables_name_veiculograma.php');
    $k = $i_veiculograma;
    for ($i = 0; $i < $k; $i++) {
        echo "
               <button class='btn btn-primary btn-sm tag_veiculograma' draggable='true' ondragstart='drag(event)' id='$coluna_veiculograma[$i]'>$coluna_veiculograma[$i]</button>    
        ";
    }
    ?>
</div>

<div class="text-center" id="div_manutencao" ondrop="drop(event)" ondragover="allowDrop(event)">
    <span>Arraste para o quadro ao lado os itens que você deseja inserir no relatório</span><hr>
    <?php
    include('app-assets/functions/get_tables_name_manutencao.php');
    $k = $i_manutencao;
    for ($i = 0; $i < $k; $i++) {
        echo "
               <button class='btn btn-primary btn-sm' draggable='true' ondragstart='drag(event)' id='$coluna_manutencao[$i]'>$coluna_manutencao[$i]</button>    
        ";
    }
    ?>
</div>

<div class="text-center" id="div_multas" ondrop="drop(event)" ondragover="allowDrop(event)">
    <span>Arraste para o quadro ao lado os itens que você deseja inserir no relatório</span><hr>
    <?php
    include('app-assets/functions/get_tables_name_multas.php');
    $k = $i_multas;
    for ($i = 0; $i < $k; $i++) {
        echo "
               <button class='btn btn-primary btn-sm' draggable='true' ondragstart='drag(event)' id='$coluna_multas[$i]'>$coluna_multas[$i]</button>    
        ";
    }
    ?>
</div>

<div class="text-center" id="div_locacao" ondrop="drop(event)" ondragover="allowDrop(event)" style="background-color: #FFFFFF; height: auto;">
    <span>Arraste para o quadro ao lado os itens que você deseja inserir no relatório</span><hr>
    <?php
    include('app-assets/functions/get_tables_name_locacao.php');
    $k = $i_locacao;
    for ($i = 0; $i < $k; $i++) {
        echo "
               <button class='btn btn-primary btn-sm' draggable='true' ondragstart='drag(event)' id='$coluna_locacao[$i]'>$coluna_locacao[$i]</button>    
        ";
    }
    ?>
</div>

<div class="text-center"  id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
  <span>Itens que serão incluidos no relatório</span><hr>
</div>

<form id="extractSQL" action="app-assets/functions/extrair_relatorio.php" method="post">
    <input type="text" id="querySQL" name="querySQL">
    <input type="text" id="name_xls" name="name_xls">
     <div id="divButttons" class="text-center">
    <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.reload();">Limpar Seleção</button>
    <button type="submit" class="btn btn-success btn-lg">Extrair Relatório</button>
</div>

</form>

<div id="query"> union all select <text id="select"></text><text id="from"></text><text id="where"></text></div>
<div id="query_dual">select <text id="select_dual"></text><text> from dual</text></div>