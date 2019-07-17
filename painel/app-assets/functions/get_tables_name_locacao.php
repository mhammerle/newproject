<?php
include("connection_cliente.php");

$sql = "SELECT COLUMN_NAME as NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE UPPER(TABLE_SCHEMA) = 'AXISCLIENTES' 
AND UPPER(TABLE_NAME) = 'LOCACAO' order by 1";

$result = mysqli_query($conn, $sql);

$i_locacao = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $coluna_locacao[$i_locacao] = str_replace('_',' ',$row['NAME']);
        $i_locacao = $i_locacao + 1;
    }
} else {
    echo "ERRO";
}

mysqli_close($conn);