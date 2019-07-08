<?php session_start(); ?>
<?php
$path_parts = pathinfo(__FILE__);
$_SESSION['nm_page'] = $path_parts['basename'];
?>
<?php require_once("../assets/functions/restrito.php"); ?>
<?php require "pages/pages.php"; ?>
<?php include('../assets/functions/get_perfil_investimentos.php'); ?>
<?php if (isset($_SESSION["importa"])) {
    echo "<script>alert('" . $_SESSION["importa"] . "');</script>";
    unset($_SESSION["importa"]);
}
?>
<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Axis Analytics. Sua plataforma de BI onde quer que você esteja.">
    <meta name="keywords" content="Axis, BI, Business Inteligence">
    <title>Axis Analytics. Bem vindo a plataforma.</title>
    <link rel="apple-touch-icon" sizes="60x60" href="app-assets/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="app-assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="app-assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="app-assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->

    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/chartist.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>
<body style="background-color: #9e9e9e">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper nav-collapsed menu-collapsed">
    <!-- main menu-->
    <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
    <div data-active-color="white" data-background-color="black" data-image="app-assets/img/sidebar-bg/07.jpg"
         class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
            <div class="logo clearfix"><a href="index.php" class="logo-text float-left">
                    <div class="logo-img"><img src="app-assets/img/logo.png"/></div>
                    <span class="text align-middle">Axis BI.</span></a>
            </div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
            <div class="nav-container" id="menu_pages">
                <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                    <!-- HOME -->
                    <li id="nav_home"><a href="index.php" id="nav_home"><i class="ft-home" id="nav_home"></i><span
                                    data-i18n="" class="menu-title" id="nav_home">Home</span></a>
                    </li>
                    <!-- PDF -->
                    <li class="has-sub nav-item"><a href="#"><i class="ft-file"></i><span data-i18n=""
                                                                                          class="menu-title">Estáticos</span></a>
                        <ul class="menu-content">
                            <li class=" nav-item" id="nav_pdf_2019">
                                <?php
                                echo '<a id="nav_pdf_2019" href="./index.php?page=estaticos/2019/' . strtolower($_SESSION['empresa_usr']) . '">';
                                ?>
                                <i id="nav_pdf_2019"></i><span id="nav_pdf_2019" data-i18n=""
                                                               class="menu-title">2019</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item" id="nav_chart">
                        <?php
                        echo '<a id="nav_chart" href="./index.php?page=charts/' . strtolower($_SESSION['empresa_usr']) . '">';
                        ?>
                        <i class="ft-bar-chart-2" id="nav_chart"></i><span id="nav_chart" data-i18n=""
                                                                           class="menu-title">Tempo Real</span></a>
                    </li>
                    <li class=" nav-item" id="nav_power_bi">
                        <?php
                        echo '<a id="nav_power_bi" href="./index.php?page=powerbi/' . strtolower($_SESSION['empresa_usr']) . '">';
                        ?>
                        <i id="nav_power_bi" class="ft-pie-chart"></i><span id="nav_power_bi" data-i18n=""
                                                                            class="menu-title">Power BI</span></a>
                    </li>
                    <li id="nav_extrair" class=" nav-item"><a id="nav_extrair"
                                                                   href="./index.php?page=extrair/extrair"><i
                                    id="nav_extrair" class="ft-download"></i><span id="nav_extrair"
                                                                                        data-i18n="" class="menu-title">Extração de Bases</span></a>
                    </li>
                    <!-- INATIVADO POR ENQUANTO
                      <li class=" nav-item" id="nav_insights">
                          <?php
                    echo '<a id="nav_insights" href="./index.php?page=insights/' . strtolower($_SESSION['empresa_usr']) . '">';
                    ?>
                        <i id="nav_insights" class="icon-bulb"></i><span id="nav_insights" data-i18n="" class="menu-title">Insights</span></a>
                      </li>
                      <li class=" nav-item" id="nav_pesquisas">
                          <?php
                    echo '<a id="nav_pesquisas" href="./index.php?page=pesquisas/' . strtolower($_SESSION['empresa_usr']) . '">';
                    ?>
                        <i id="nav_pesquisas" class="icon-magnifier"></i><span id="nav_pesquisas" data-i18n="" class="menu-title">Pesquisas</span></a>
                      </li>
                      -->
                    <li id="nav_solicitacoes" class=" nav-item"><a id="nav_solicitacoes"
                                                                   href="./index.php?page=solicitacoes/solicitacoes"><i
                                    id="nav_solicitacoes" class="icon-energy"></i><span id="nav_solicitacoes"
                                                                                        data-i18n="" class="menu-title">Solicitações</span></a>
                    </li>

                    <li class=" nav-item"><a id="logoff" onclick="logofff()"><i class="ft-log-out"></i><span
                                    data-i18n="" class="menu-title">Sair do Sistema</span></a>
                    </li>
                </ul>
                <script>
                    function logofff() {
                        $.ajax({
                            type: "post",
                            data: {},
                            dataType: "html",
                            url: "app-assets/functions/kill.php",

                            success: function (result) {
                                if (result == 'FECHADA') {
                                    window.location.replace("/acess.php");
                                }
                            },
                            beforeSend: function () {

                            },
                            complete: function (msg) {

                            }
                        });
                        return false;
                    }
                </script>
            </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
    </div>
    <!-- / main menu-->

    <div class="main-panel">

        <!-- Navbar (Header) Starts-->
        <nav class="navbar navbar-expand-lg navbar-light sticky-top"
             style="background-color: #9e9e9e; border-bottom: 2px solid #707070;">
            <div class="container-fluid">
                <div class="navbar-header" id="header_page"></div>
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span
                                class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                                class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="navbar-container">
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item mr-2"><a id="navbar-fullscreen" href="javascript:"
                                                         class="nav-link apptogglefullscreen"><i
                                            class="ft-maximize font-medium-3 blue-grey darken-4"></i>
                                    <p class="d-none">fullscreen</p></a></li>
                            <li class="dropdown nav-item"><a id="dropdownBasic2" href="#" data-toggle="dropdown"
                                                             class="nav-link position-relative dropdown-toggle"><i
                                            class="ft-bell font-medium-3 blue-grey darken-4"></i><span
                                            class="notification badge badge-pill badge-danger">4</span>
                                    <p class="d-none">Notifications</p></a>
                                <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                                    <div class="noti-list"><a
                                                class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i
                                                    class="ft-bell info float-left d-block font-large-1 mt-1 mr-2"></i><span
                                                    class="noti-wrapper"><span
                                                        class="noti-title line-height-1 d-block text-bold-400 info">New Order Received</span><span
                                                        class="noti-text">Lorem ipsum dolor sit ametitaque in, et!</span></span></a><a
                                                class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i
                                                    class="ft-bell warning float-left d-block font-large-1 mt-1 mr-2"></i><span
                                                    class="noti-wrapper"><span
                                                        class="noti-title line-height-1 d-block text-bold-400 warning">New User Registered</span><span
                                                        class="noti-text">Lorem ipsum dolor sit ametitaque in </span></span></a><a
                                                class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i
                                                    class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i><span
                                                    class="noti-wrapper"><span
                                                        class="noti-title line-height-1 d-block text-bold-400 danger">New Order Received</span><span
                                                        class="noti-text">Lorem ipsum dolor sit ametest?</span></span></a><a
                                                class="dropdown-item noti-container py-3"><i
                                                    class="ft-bell success float-left d-block font-large-1 mt-1 mr-2"></i><span
                                                    class="noti-wrapper"><span
                                                        class="noti-title line-height-1 d-block text-bold-400 success">New User Registered</span><span
                                                        class="noti-text">Lorem ipsum dolor sit ametnatus aut.</span></span></a>
                                    </div>
                                    <a class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1">Read
                                        All Notifications</a>
                                </div>
                            </li>
                            <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown"
                                                             class="nav-link position-relative dropdown-toggle"><i
                                            class="ft-user font-medium-3 blue-grey darken-4"></i>
                                    <p class="d-none">User Settings</p></a>
                                <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3"
                                     class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item py-1"><span><?php echo $_SESSION['nome_usr'];?></span></a><hr>

                                    <a href="./index.php?page=profile" class="dropdown-item py-1"><i
                                                class="ft-edit mr-2"></i><span>Editar Perfil</span></a>
                                    <a href="javascript:" class="dropdown-item py-1"><i class="ft-mail mr-2"></i><span>Mensagens</span></a>
                                    <a href="./index.php?page=logacesso" class="dropdown-item py-1"><i
                                                class="ft-clipboard mr-2"></i><span>Log de Acesso</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:" class="dropdown-item" onclick="logofff()">
                                        <i class="ft-power mr-2"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar (Header) Ends-->

        <!-- Inicio do BODY -->
        <div class="main-content" style="background-color: #FFFFFF;" id="divContent">
            <div class="content-wrapper">
                <?php
                try {
                    require load();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                ?>
            </div>
        </div>
        <!-- Fim do BODY -->
        <!-- Inicio do Rodapé -->
        <footer class="footer footer-static" style="background-color: #9e9e9e; border-top: 2px solid #707070;">
            <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2019 <a
                            href="https://www.axisbi.com.br" id="pixinventLink" target="_blank"
                            class="text-bold-800 primary darken-2">Axis Analytics</a>, All rights reserved. </span></p>
        </footer>
        <!-- Fim do Rodapé -->
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- START Notification Sidebar-->
<!-- END Notification Sidebar-->
<!-- Theme customizer Starts-->

<!-- Theme customizer Ends-->
<!-- BEGIN VENDOR JS-->
<script src="app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="app-assets/vendors/js/chartist.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="app-assets/js/app-sidebar.js" type="text/javascript"></script>
<script src="app-assets/js/notification-sidebar.js" type="text/javascript"></script>
<script src="app-assets/js/customizer.js" type="text/javascript"></script>
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/dashboard1.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- main js-->
<script src="app-assets/js/main.js" type="text/javascript"></script>
</body>
</html>