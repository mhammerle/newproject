<?php
include("connection_cliente.php");

$sql = "SELECT DATE_FORMAT(DATA_SOLICITACAO, '%d/%m/%Y %H:%i') AS DATA_SOLICITACAO, CODIGOSOL, SOLICITANTE, SOLICITACAO
 FROM SOLICITACOES WHERE STATUS_SOLICITACAO = 2 and upper(EMPRESA) = UPPER('" . $_SESSION['empresa_usr'] . "')";

$result = mysqli_query($conn, $sql);

$i_em_atendimento = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $codigo_sol2[$i_em_atendimento] = $row['CODIGOSOL'];
        $solicitante2[$i_em_atendimento] = $row['SOLICITANTE'];
        $solicitacao2[$i_em_atendimento] = $row['SOLICITACAO'];
        $data_sol2[$i_em_atendimento] = $row['DATA_SOLICITACAO'];
        $i_em_atendimento = $i_em_atendimento + 1;
    }
} else {
    echo "ERRO";
}