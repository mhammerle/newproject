<?php
header('Content-Type: application/json');
include('connection_cliente.php');
if( session_id() == '' )
{
    session_start();
}


if(isset($_GET['dtInicialManutencao'])){
    $dtInicial = $_GET['dtInicialManutencao'];
} else {
    $dtInicial = '2000-01-01';
}

if(isset($_GET['dtFinalManutencao'])){
    $dtFinal = $_GET['dtFinalManutencao'];
} else {
    $dtFinal = date('Y-m-d');
}

$sql = "select status as motivo, count(ordem_servico) as qnt from MANUTENCAO 
        where upper(cliente) = '".$_SESSION['empresa_usr']."' 
        and dtabertura >= '".$dtInicial."' 
        and dtabertura <= '".$dtFinal."'
        group by status 
        order by 2 desc";

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