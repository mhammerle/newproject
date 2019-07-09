<?php
session_start();
$_SESSION = array();

include('connection_open.php');

$usuario_email = filter_input(INPUT_POST, "nome_usuario", FILTER_SANITIZE_EMAIL);
$senha_login = filter_input(INPUT_POST, "nome_senha", FILTER_SANITIZE_STRING);

$sql = "select nome, email, empresa, id, telefone, observacao, senha, usuario, e_2017, e_2018, e_2019, real_time, power_bi, extracao, solicitacao from usuarios u 
inner join acessos a on a.codigo_usuario = u.id where upper(email) = 
        upper('" . $usuario_email . "') and senha = '" . sha1($senha_login) . "';";
echo $sql;

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['nome_usr'] = $row["nome"];
        $_SESSION['email_usr'] = $row["email"];
        $_SESSION['empresa_usr'] = $row["empresa"];
        $_SESSION['id_usr'] = $row["id"];
        $_SESSION['telefone_usr'] = $row["telefone"];
        $_SESSION['observacao_usr'] = $row["observacao"];
        $_SESSION['senha_usr'] = $row["senha"];
        $_SESSION['usuario_usr'] = $row["usuario"];

        $_SESSION['e_2017'] = $row["e_2017"];
        $_SESSION['e_2018'] = $row["e_2018"];
        $_SESSION['e_2019'] = $row["e_2019"];
        $_SESSION['real_time'] = $row["real_time"];
        $_SESSION['power_bi'] = $row["power_bi"];
        $_SESSION['extracao'] = $row["extracao"];
        $_SESSION['solicitacao'] = $row["solicitacao"];

        include('registralog.php');
        mysqli_close($conn);
        header("location: ../../painel/index.php");

    }
} else {
    $_SESSION["invalido"] = "Usuário ou senha inválido";
    mysqli_close($conn);
    header("location: /acess.php");
}

