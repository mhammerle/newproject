<script>
    function toogleActive() {
        document.getElementById("nav_home").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Bem vindo!</h3>";
    }

    toogleActive();
</script>
<?php $_SESSION["page"] = "Home" ?>

<!-- Inicio do BODY -->
<div class="row" matchHeight="card">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-warning">
            <div class="card-body">
                <div class="px-3 py-3">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3>78</h3>
                            <span>Dias de Contrato</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="icon-rocket white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-success">
            <div class="card-body">
                <div class="px-3 py-3">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3>156</h3>
                            <span>Acessos</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="icon-user white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-danger">
            <div class="card-body">
                <div class="px-3 py-3">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3>89</h3>
                            <span>Relatórios</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="icon-pie-chart white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="px-3 py-3">
                    <div class="media">
                        <div class="media-body white text-left">
                            <h3>23</h3>
                            <span>Pedidos Atendidos</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="icon-support white font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row match-height">
    <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <img class="card-img-top img-fluid" src="app-assets/img/photos/06.jpg" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Insight Finalizado</h4>
                    <p class="card-text">Seu estudo sobre a variação dos custos do etanol no interior do Tocantins foi
                        finalizado.</p>
                    <a class="btn btn-raised btn-warning" href="pages/insights/axis.php">Vizualize Agora</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <img class="card-img img-fluid mb-3" src="app-assets/img/photos/08.jpg" alt="Card image cap">
                    <h4 class="card-title">Relatório Divulgado</h4>
                    <p class="card-text">Já está na sua página o relatório estático desse mês.
                    </p>
                    <a class="btn btn-raised btn-success" href="pages/estaticos/2019/marco/pages/axis.php">Abrir</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fim do BODY -->