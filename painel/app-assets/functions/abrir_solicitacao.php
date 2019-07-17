<?php
include('connection_cliente.php');
session_start();
$txt_solicitacao = filter_input(INPUT_POST, "solicitacao_txt", FILTER_SANITIZE_STRING);


$sql = "insert into SOLICITACOES (solicitante, data_solicitacao, solicitacao, status_solicitacao, link_anexo,
                                  empresa) values('" . $_SESSION['nome_usr'] . "',sysdate(),'{$txt_solicitacao}',1,null,'" .
    $_SESSION['empresa_usr'] . "')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['sol_aberta'] = 1;//'Solicitação aberta com sucesso!';
} else {
    $_SESSION['sol_aberta'] = 2;//'Ocorreu algum erro durante sua solicitação';
}

header("location: ../../../painel/index.php?page=solicitacoes/solicitacoes");