<?php
//header('Content-Type: application/json');
include('connection_cliente.php');
if( session_id() == '' )
{
    session_start();
}

$sql = "select count(placa) as qnt from VEICULOGRAMA 
        where upper(situacao) = 'ATIVA' 
        and upper(proprietario) = '".$_SESSION['empresa_usr']."'";

$result = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
       echo $row['qnt']; //$data[] = $row;
    }
} else {
    echo "ERRO";
}

mysqli_close($conn);

//echo json_encode($data);
