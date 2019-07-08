<?php
include('connection_open.php');

$sql = "insert into logacesso (nome_usuario, dt_hr_acesso, empresa) values('"
    . $_SESSION['nome_usr'] .
    "',sysdate(),'"
    . $_SESSION['empresa_usr'] .
    "')";
mysqli_query($conn, $sql);