<?php
$path_parts = pathinfo(__FILE__);
$_SESSION['nm_page'] = $path_parts['basename'];
include('app-assets/functions/restrito.php')
?>
<script>
    function toogleActive() {
        document.getElementById("nav_pdf_2017").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Relatórios estáticos - 2017</h3>";
    }

    toogleActive();
</script>
<br>
<div class="row" style="border: 2px solid #11bf8a; border-radius: 8px; margin-top: 10px; display:flex; background-color: #11bf8a" id="main_body">
    <div class="btn-group-vertical" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('01','2017')" disabled>Janeiro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('02','2017')" disabled>Fevereiro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('03','2017')" disabled>Março</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('04','2017')">Abril</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('05','2017')">Maio</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('06','2017')">Junho</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('07','2017')">Julho</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('08','2017')">Agosto</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('09','2017')">Setembro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('10','2017')">Outubro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('11','2017')" disabled>Novembro</button>
        <button type="button" class="btn btn-success btn-lg" onclick="toogleMonth('12','2017')">Dezembro</button>
    </div>
    <iframe id="pdf_frame" height="auto" src="" style="border: none; float: right;
    flex-grow: 1; border-radius: 8px; margin-bottom: 10px; margin-top: 10px; margin-right: 10px; margin-left: 5px;"></iframe>
</div>