<?php
$path_parts = pathinfo(__FILE__);
$_SESSION['nm_page'] = $path_parts['basename'];
include('app-assets/functions/restrito.php')
?>
<script>
    function toogleActive() {
        document.getElementById("nav_pdf_2019").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Relatórios estáticos - 2019</h3>";
    }

    toogleActive();
</script>
<br>
<div class="row" style="border: 2px solid #11bf8a; border-radius: 8px; margin-top: 10px; display:flex; background-color: #11bf8a" id="main_body">
<div class="btn-group-vertical" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('01','2019')">Janeiro</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('02','2019')">Fevereiro</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('03','2019')">Março</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('04','2019')" disabled>Abril</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('05','2019')">Maio</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('06','2019')" disabled>Junho</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('07','2019')" disabled>Julho</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('08','2019')" disabled>Agosto</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('09','2019')" disabled>Setembro</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('10','2019')" disabled>Outubro</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('11','2019')" disabled>Novembro</button>
    <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('12','2019')" disabled>Dezembro</button>
</div>
    <iframe id="pdf_frame" height="auto" src="" style="border: none; float: right;
    flex-grow: 1; border-radius: 8px; margin-bottom: 10px; margin-top: 10px; margin-right: 10px; margin-left: 5px;"></iframe>
</div>
