<script>
    function toogleActive() {
        document.getElementById("nav_extrair").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Extração de Bases</h3>";
    }

    toogleActive();
</script>




<div id="main_body">

<head>
    <script src=/newproject-master/painel/app-assets/js/popover.js> </script> <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>

    <script src="https://kit.fontawesome.com/4f7322ddbf.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<br>

<body class = "bodytag">
<div id="mods" class="dropdown text-center">
    <button class="btn btn-primary dropdown-toggle btn-lg btn-block text-center" type="button"
            id="dropdownMenuButtonModulo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Escolha o Template
    </button>
    <div class="dropdown-menu btn-block text-center" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" onclick="selectType('veiculograma')" id="veiculograma">Veiculograma</a>
        <a class="dropdown-item" href="#" onclick="selectType('manutencao')" id="manutencao">Manutenção</a>
        <a class="dropdown-item" href="#" onclick="selectType('locacao')" id="locacao">Locação</a>
        <a class="dropdown-item" href="#" onclick="selectType('multas')" id="multas">Multas</a>
    </div>
</div>
<br>
<!-- VEICULOGRAMA -->
<div class="text-center" id="div_veiculograma">
    <div class="inline">
        <h1>Seletor</h1><span>
            <hr>
    </div>
    <span><h6>Arraste para o quadro ao lado os itens que você deseja inserir no relatório.</h6></span><br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Procure pela TAG</span>
        </div>
        <input id="texto_procuradov" type="text" class="form-control" aria-label="With textarea"
               onkeyup="filtrar_tags('texto_procuradov','divespveic','tag_veiculograma')">
    </div>
    <hr>
 <div id="divespveic" ondrop="drop(event)" ondragover="allowDrop(event)">
    <?php
    include('app-assets/functions/get_tables_name_veiculograma.php');
    $k = $i_veiculograma;
    for ($i = 0; $i < $k; $i++) {
        echo "
               <button class='btn btn-success btn-sm tag_veiculograma' role='button' data-toggle='popover' title='Arraste para o lado para incluir no relatório.' data-content='Aqui vai algum tipo de conteúdo. Muito da hora, né?!' draggable='true' ondragstart='drag(event)' id='$coluna_veiculograma[$i]'>$coluna_veiculograma[$i]</button>    
        ";
    }
    ?>
 </div>
</div>
<!-- MULTAS -->
<div class="text-center" id="div_multas">
    <div class="inline">
        <h1>Seletor</h1><span>
            <hr>
    </div>
    <span><h6>Arraste para o quadro ao lado os itens que você deseja inserir no relatório.</h6></span><br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Procure pela TAG</span>
        </div>
        <input id="texto_procuradomu" type="text" class="form-control" aria-label="With textarea"
               onkeyup="filtrar_tags('texto_procuradomu','divespmult','tag_multas')">
    </div>
    <hr>
    <div id="divespmult" ondrop="drop(event)" ondragover="allowDrop(event)">
        <?php
        include('app-assets/functions/get_tables_name_multas.php');
        $k = $i_multas;
        for ($i = 0; $i < $k; $i++) {
            echo "
               <button class='btn btn-success btn-sm tag_multas' role='button' data-toggle='popover' title='Arraste para o lado para incluir no relatório.' data-content='Aqui vai algum tipo de conteúdo. Muito da hora, né?!' draggable='true' ondragstart='drag(event)' id='$coluna_multas[$i]'>$coluna_multas[$i]</button>    
        ";
        }
        ?>
    </div>
</div>
<!-- MANUTENCAO -->
<div class="text-center" id="div_manutencao">
    <div class="inline">
        <h1>Seletor</h1><span>
            <hr>
    </div>
    <span><h6>Arraste para o quadro ao lado os itens que você deseja inserir no relatório.</h6></span><br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Procure pela TAG</span>
        </div>
        <input id="texto_procuradoma" type="text" class="form-control" aria-label="With textarea"
               onkeyup="filtrar_tags('texto_procuradoma','divespmanut','tag_manutencao')">
    </div>
    <hr>
    <div id="divespmanut" ondrop="drop(event)" ondragover="allowDrop(event)">
        <?php
        include('app-assets/functions/get_tables_name_manutencao.php');
        $k = $i_manutencao;
        for ($i = 0; $i < $k; $i++) {
            echo "
               <button class='btn btn-success btn-sm tag_manutencao' role='button' data-toggle='popover' title='Arraste para o lado para incluir no relatório.' data-content='Aqui vai algum tipo de conteúdo. Muito da hora, né?!' draggable='true' ondragstart='drag(event)' id='$coluna_manutencao[$i]'>$coluna_manutencao[$i]</button>    
        ";
        }
        ?>
    </div>
</div>
<!-- LOCACAO -->
<div class="text-center" id="div_locacao">
    <div class="inline">
        <h1>Seletor</h1><span>
            <hr>
    </div>
    <span><h6>Arraste para o quadro ao lado os itens que você deseja inserir no relatório.</h6></span><br>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Procure pela TAG</span>
        </div>
        <input id="texto_procuradol" type="text" class="form-control" aria-label="With textarea"
               onkeyup="filtrar_tags('texto_procuradol','divesploc','tag_locacao')">
    </div>
    <hr>
    <div id="divesploc" ondrop="drop(event)" ondragover="allowDrop(event)">
        <?php
        include('app-assets/functions/get_tables_name_locacao.php');
        $k = $i_locacao;
        for ($i = 0; $i < $k; $i++) {
            echo "
               <button class='btn btn-success btn-sm tag_locacao' role='button' data-toggle='popover' title='Arraste para o lado para incluir no relatório.' data-content='Aqui vai algum tipo de conteúdo. Muito da hora, né?!' draggable='true' ondragstart='drag(event)' id='$coluna_locacao[$i]'>$coluna_locacao[$i]</button>    
        ";
        }
        ?>
    </div>
</div>



<form id="extractSQL" action="app-assets/functions/extrair_relatorio.php" method="post">
<div class="text-center" id="div3" >

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

<div id="query"> union all select <text id="select"></text><text id="from"></text><text id="where"></text></div>
<div id="query_dual">select <text id="select_dual"></text><text> from dual</text></div>


</body>
</div>