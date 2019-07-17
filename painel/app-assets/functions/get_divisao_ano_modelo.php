<?php
header('Content-Type: application/json');
include('connection_cliente.php');
if( session_id() == '' )
{
    session_start();
}

$sql = "select ano_modelo as ano_modelo, count(placa) as qnt from VEICULOGRAMA 
        where upper(situacao) = 'ATIVA' 
        and upper(proprietario) = '".$_SESSION['empresa_usr']."'
        group by ano_modelo order by 1 desc";

$result = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
    echo "ERRO";
}

mysqli_close($conn);

echo json_encode($data);