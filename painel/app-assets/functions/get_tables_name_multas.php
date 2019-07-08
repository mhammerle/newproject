<?php
include("connection_cliente.php");

$sql = "SELECT COLUMN_NAME as NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE UPPER(TABLE_SCHEMA) = 'AXISCLIENTES' 
AND UPPER(TABLE_NAME) = 'MULTAS' order by 1";

$result = mysqli_query($conn, $sql);

$i_multas = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $coluna_multas[$i_multas] = str_replace('_',' ',$row['NAME']);
        $i_multas = $i_multas + 1;
    }
} else {
    echo "ERRO";
}

mysqli_close($conn);