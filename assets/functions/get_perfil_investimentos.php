<?php
include('connection_cliente.php');

$sql = "SELECT DATE_FORMAT(data_importacao, '%d/%m/%Y %H:%i') AS DATA_IMPORTACAO, TIPO_ATIVO, INVESTIMENTO, USUARIO FROM PERFIL_INVESTIMENTOS where DATE_FORMAT(data_importacao, '%d/%m/%Y %H:%i') = (SELECT MAX(DATE_FORMAT(data_importacao, '%d/%m/%Y %H:%i')) FROM PERFIL_INVESTIMENTOS)";

$result = mysqli_query($conn, $sql);

$i_perfil_investimento = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tipo_ativo[$i_perfil_investimento] = $row['TIPO_ATIVO'];
        $investimento[$i_perfil_investimento] = $row['INVESTIMENTO'];
        $dt_import[$i_perfil_investimento] = $row['DATA_IMPORTACAO'];
        $usr_import[$i_perfil_investimento] = $row['USUARIO'];
        $i_perfil_investimento = $i_perfil_investimento + 1;
    }
} else {
    echo "ERRO";
}