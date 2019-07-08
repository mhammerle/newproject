<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Contato</title>
    <head>
<body>
<?php
include("connection_cliente.php");

$sql = "SELECT DATE_FORMAT(DATA_SOLICITACAO, '%d/%m/%Y %H:%i') AS DATA_SOLICITACAO, CODIGOSOL, SOLICITANTE, SOLICITACAO
 FROM SOLICITACOES WHERE STATUS_SOLICITACAO = 1 and upper(EMPRESA) = UPPER('" . $_SESSION['empresa_usr'] . "')";

$result = mysqli_query($conn, $sql);

$i_sol_abertas = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $codigo_sol1[$i_sol_abertas] = $row['CODIGOSOL'];
        $solicitante1[$i_sol_abertas] = $row['SOLICITANTE'];
        $solicitacao1[$i_sol_abertas] = $row['SOLICITACAO'];
        $data_sol1[$i_sol_abertas] = $row['DATA_SOLICITACAO'];
        $i_sol_abertas = $i_sol_abertas + 1;
    }
} else {
    echo "ERRO";
}
?>
</body>
</html>