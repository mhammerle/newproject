<?php
include("connection_cliente.php");

$sql = "SELECT COLUMN_NAME as NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE UPPER(TABLE_SCHEMA) = 'AXISCLIENTES' 
AND UPPER(TABLE_NAME) = 'MANUTENCAO' order by 1";

$result = mysqli_query($conn, $sql);

$i_manutencao = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $coluna_manutencao[$i_manutencao] = str_replace('_',' ',$row['NAME']);
        $i_manutencao = $i_manutencao + 1;
    }
} else {
    echo "ERRO";
}

mysqli_close($conn);