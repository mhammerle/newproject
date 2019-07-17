<?php
include("connection_cliente.php");
if( session_id() == '' )
{
    session_start();
}

if(!isset($_GET['tipo'])){
	$_GET['tipo'] = 'veiculograma';
}

$tabela = $_GET['tipo'];

if($tabela == 'locacao' ){
	$sql = "SELECT COLUMN_NAME as NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE UPPER(TABLE_SCHEMA) = 'AXISCLIENTES' 
	AND UPPER(TABLE_NAME) = 'LOCACAO' order by 1";
}
if($tabela == 'manutencao' ){
	$sql = "SELECT COLUMN_NAME as NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE UPPER(TABLE_SCHEMA) = 'AXISCLIENTES' 
	AND UPPER(TABLE_NAME) = 'MANUTENCAO' order by 1";
}
if($tabela == 'multas' ){
	$sql = "SELECT COLUMN_NAME as NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE UPPER(TABLE_SCHEMA) = 'AXISCLIENTES' 
	AND UPPER(TABLE_NAME) = 'MULTAS' order by 1";
}
if($tabela == 'veiculograma' ){
	$sql = "SELECT COLUMN_NAME as NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE UPPER(TABLE_SCHEMA) = 'AXISCLIENTES' 
	AND UPPER(TABLE_NAME) = 'VEICULOGRAMA' order by 1";
}
echo $sql;
$result = mysqli_query($conn, $sql);

$i_coluna = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $coluna[$i_coluna] = str_replace('_',' ',$row['NAME']);
        $i_coluna = $i_coluna + 1;
    }
} else {
    echo "ERRO";
}

mysqli_close($conn);
