<?php
include('connection_cliente.php');
session_start();

$arquivo = $_FILES["importArquivo"]["tmp_name"];
$nome = $_FILES["importArquivo"]["name"];

$ext = explode(".", $nome);
$extensao = end($ext);
$data_import = date('Y-m-d H:i');
$contador = 0;
$nome_atual = $_SESSION['nome_usr'];

if ($extensao != "csv") {
    $_SESSION['importa'] = "Extensão inválida";
    header("Location: ../../index.php?page=charts/" . strtolower($_SESSION['empresa_usr']));
} else {
    if (($objeto = fopen($arquivo, "r")) !== FALSE) {
        while (($dados = fgetcsv($objeto, 1000, ",")) !== FALSE) {
            $tipo_ativo = ($dados[0]);
            $investimento = ($dados[1]);
            if ($contador != 0) {
                $sql = "insert into PERFIL_INVESTIMENTOS(DATA_IMPORTACAO,TIPO_ATIVO, INVESTIMENTO, USUARIO) values('$data_import','$tipo_ativo',$investimento, '$nome_atual')";
                $query = mysqli_query($conn, $sql);
            }
            $contador = $contador + 1;
        }
        echo "Relatório Atualizado com Sucesso";
        mysqli_close($conn);
        header("Location: ../../index.php?page=charts/" . strtolower($_SESSION['empresa_usr']));
    } else {
        $_SESSION['importa'] = "Ocorreu algum erro na importação do arquivo.";
        header("Location: ../../index.php?page=charts/" . strtolower($_SESSION['empresa_usr']));
    }
}
