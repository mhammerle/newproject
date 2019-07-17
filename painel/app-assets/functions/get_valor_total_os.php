<?php
//header('Content-Type: application/json');
include('connection_cliente.php');

if( session_id() == '' )
{
    session_start();
}

if(isset($_POST['dtInicialManutencao'])){
    $dtInicial = $_POST['dtInicialManutencao'];
} else {
    $dtInicial = '2000-01-01';
}

if(isset($_POST['dtFinalManutencao'])){
    $dtFinal = $_POST['dtFinalManutencao'];
} else {
    $dtFinal = date('Y-m-d');
}


$sql = "select round(sum(valor_os),2) as valor_total from MANUTENCAO where upper(cliente) = '".$_SESSION['empresa_usr']."' 
        and dtabertura >= '".$dtInicial."' 
        and dtabertura <= '".$dtFinal."'";

$result = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "R$ ".number_format($row['valor_total'], 2, ',', '.'); //$data[] = $row;
    }
} else {
    echo "ERRO";
}

mysqli_close($conn);

//echo json_encode($data);
