<?php
$path_parts = pathinfo(__FILE__);
$_SESSION['nm_page'] = $path_parts['basename'];
include('app-assets/functions/restrito.php')
?>
<script>
    function toogleActive() {
        document.getElementById("nav_pdf_2019").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Relatórios estáticos</h3>";
    }

    toogleActive();
</script>

<br>
<div id="main_body">
<div class="accordion" id="estatico_2019">
    <div id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Janeiro
            </button>
        </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <?php
            echo '<iframe src="pages/estaticos/2019/pdfs/' . strtolower($_SESSION['empresa_usr']) . '_jan_2019.pdf" width="100%" height="1000px" style="border: none;"></iframe>';
            ?>
        </div>
    </div>
    <div id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Fevereiro
            </button>
        </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <?php
            echo '<iframe src="pages/estaticos/2019/pdfs/' . strtolower($_SESSION['empresa_usr']) . '_fev_2019.pdf" width="100%" height="1000px" style="border: none;"></iframe>';
            ?>
        </div>
    </div>
    <div id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Março
            </button>
        </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <?php
            echo '<iframe src="pages/estaticos/2019/pdfs/' . strtolower($_SESSION['empresa_usr']) . '_mar_2019.pdf" width="100%" height="1000px" style="border: none;"></iframe>';
            ?>
        </div>
    </div>
</div>
</div>