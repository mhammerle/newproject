<?php
include('connection_open.php');

$sql = "select nome_usuario, DATE_FORMAT(dt_hr_acesso, '%d/%m/%Y %H:%i') as dt_hr_acesso from logacesso where upper(empresa) = upper('" . $_SESSION['empresa_usr'] . "') order by dt_hr_acesso desc limit 20;";

$result = mysqli_query($conn, $sql);

$i_log = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $nome_usu[$i_log] = $row['nome_usuario'];
        $data_acesso[$i_log] = $row['dt_hr_acesso'];
        $i_log = $i_log + 1;
    }
} else {
    echo "ERRO";
}
include('connection_close.php');
