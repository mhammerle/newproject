<?php
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

$sql = "select placa, 
       case when status = 'CORRETIVA' then sum(valor_os) end as corretiva,
       case when status = 'PREVENTIVA' then sum(valor_os) end as preventiva,
       case when status = 'SINISTRO' then sum(valor_os) end as sinistro,
       case when status not in ('CORRETIVA','SINISTRO','PREVENTIVA') then sum(valor_os) end as outros,
       sum(valor_os) as total
       from MANUTENCAO 
       where upper(cliente) = '".$_SESSION['empresa_usr']."' 
       and dtabertura >= '".$dtInicial."' 
       and dtabertura <= '".$dtFinal."'
       group by placa
       order by 6 desc limit 10";

$result = mysqli_query($conn, $sql);

$i_status_placa = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $placa[$i_status_placa] = $row['placa'];
        $corretiva[$i_status_placa] = number_format($row['corretiva'],2,',','.');
        $preventiva[$i_status_placa] = number_format($row['preventiva'],2,',','.');
        $sinistro[$i_status_placa] = number_format($row['sinistro'],2,',','.');
        $outros[$i_status_placa] = number_format($row['outros'],2,',','.');
        $total[$i_status_placa] = number_format($row['total'],2,',','.');
        $i_status_placa = $i_status_placa + 1;
    }
} else {
    echo "ERRO";
}
include('connection_close.php');