<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Contato</title>
    <head>
<body>
<?php
include('connection_cliente.php');

// Definimos o nome do arquivo que será exportado
$sql = $_POST['querySQL'];
$nome_arquivo = $_POST['name_xls'];
$quant = (substr_count($sql,',')/2)+1;

$arquivo = $nome_arquivo.'.xls';

// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td colspan="1">Relatório de '.$nome_arquivo.'</tr>';
$html .= '</tr>';

//Selecionar todos os itens da tabela
$result_msg_contatos = $sql;
$resultado_msg_contatos = mysqli_query($conn , $result_msg_contatos);

while($row_msg_contatos = mysqli_fetch_array($resultado_msg_contatos)){

    $html .= '<tr>';
    for($i = 0; $i < $quant; $i++){
        $html .= '<td>'.$row_msg_contatos[$i].'</td>';
    }
    $html .= '</tr>';

}

mysqli_close($conn);

// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=".$arquivo );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
unset($_POST);
exit; ?>
</body>
</html>
