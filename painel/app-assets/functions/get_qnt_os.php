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


$sql = "select count(distinct ordem_servico) as qnt from MANUTENCAO where upper(cliente) = '".$_SESSION['empresa_usr']."' 
        and dtabertura >= '".$dtInicial."' 
        and dtabertura <= '".$dtFinal."'";

$result = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo number_format($row['qnt'], 0, ',', '.');  //$data[] = $row;
    }
} else {
    echo "ERRO";
}

mysqli_close($conn);

//echo json_encode($data);
