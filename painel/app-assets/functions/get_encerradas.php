<?php
include("connection_cliente.php");

$sql = "SELECT DATE_FORMAT(DATA_SOLICITACAO, '%d/%m/%Y %H:%i') AS DATA_SOLICITACAO,
 DATE_FORMAT(DATA_ENCERRAMENTO, '%d/%m/%Y %H:%i') AS DATA_ENCERRAMENTO,CODIGOSOL, SOLICITANTE, SOLICITACAO
 FROM SOLICITACOES WHERE STATUS_SOLICITACAO = 3 and upper(EMPRESA) = UPPER('" . $_SESSION['empresa_usr'] . "')";

$result = mysqli_query($conn, $sql);

$i_encerradas = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $codigo_sol3[$i_encerradas] = $row['CODIGOSOL'];
        $solicitante3[$i_encerradas] = $row['SOLICITANTE'];
        $solicitacao3[$i_encerradas] = $row['SOLICITACAO'];
        $data_sol3[$i_encerradas] = $row['DATA_SOLICITACAO'];
        $data_enc3[$i_encerradas] = $row['DATA_ENCERRAMENTO'];
        $i_encerradas = $i_encerradas + 1;
    }
} else {
    echo "ERRO";
}