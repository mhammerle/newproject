<?php
// Se o usuário não está logado, manda para página de login.
if (!isset($_SESSION['id_usr'])) header("Location: /acess.php");

$nm_page = $_SESSION['nm_page'];
$page = explode(".", $nm_page);
$empresa = $page[0];

if (strtoupper($empresa) != 'INDEX') {
    if (strtoupper($_SESSION['empresa_usr']) != strtoupper($empresa)) {
        header("Location: /acess.php");
    }
}
