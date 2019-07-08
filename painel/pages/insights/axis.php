<?php
$path_parts = pathinfo(__FILE__);
$_SESSION['nm_page'] = $path_parts['basename'];
include('app-assets/functions/restrito.php')
?>


<script>
    function toogleActive() {
        document.getElementById("nav_insights").classList.add("active");
    }

    toogleActive();
</script>


<script type="text/javascript">
    document.getElementById('nav_home').classList.remove('active');
    document.getElementByID("nav_chart").classList.add('active');
</script>
<div class="row full-height-vh">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card border-grey border-lighten-3 px-1 py-1 box-shadow-3">
            <div class="card-block">
                                <span class="card-title text-center">
                                <img alt="Axis" class="img-fluid mx-auto d-block pt-2 mb-1"
                                     src="app-assets/img/logos/logo-color-big.png" width="100">
                            </span>
            </div>
            <div class="card-block text-center">
                <h3>Essa página está em manutenção</h3>
                <p>Desculpe pela incomodo.
                    <br> Por favor, volte mais tarde ou entre em contato com a nossa equipe.</p>
                <div class="mt-2"><i class="fa fa-cog spinner font-large-2"></i></div>
            </div>
            <hr>
            <p class="socialIcon card-text text-center pt-2 pb-2">
                <a class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <a class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <a class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin">
                    <span class="fa fa-linkedin font-medium-4"></span>
                </a>
                <a class="btn btn-social-icon mr-1 mb-1 btn-outline-github">
                    <span class="fa fa-github font-medium-4"></span>
                </a>
            </p>
        </div>
    </div>
</div>
