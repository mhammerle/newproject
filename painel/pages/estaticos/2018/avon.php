<?php
$path_parts = pathinfo(__FILE__);
$_SESSION['nm_page'] = $path_parts['basename'];
include('app-assets/functions/restrito.php')
?>
<script>
    function toogleActive() {
        document.getElementById("nav_pdf_2018").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Relatórios estáticos - 2018</h3>";
    }

    toogleActive();
</script>
<br>
<div class="row" style="border: 2px solid #11bf8a; border-radius: 8px; margin-top: 10px; display:flex; background-color: #11bf8a" id="main_body">
    <div class="btn-group-vertical" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('01','2018')">Janeiro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('02','2018')">Fevereiro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('03','2018')">Março</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('04','2018')">Abril</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('05','2018')">Maio</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('06','2018')">Junho</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('07','2018')">Julho</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('08','2018')">Agosto</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('09','2018')">Setembro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('10','2018')">Outubro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('11','2018')">Novembro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('12','2018')">Dezembro</button>
    </div>
    <iframe id="pdf_frame" height="auto" src="" style="border: none; float: right;
    flex-grow: 1; border-radius: 8px; margin-bottom: 10px; margin-top: 10px; margin-right: 10px; margin-left: 5px;"></iframe>
</div>