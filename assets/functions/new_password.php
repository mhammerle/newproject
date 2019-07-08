<?php

$newkey = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);//$_POST['password'];
$newkeyc = filter_input(INPUT_POST, "cpassword", FILTER_SANITIZE_STRING);//$_POST['cpassword'];
$email = filter_input(INPUT_POST, "utilizador", FILTER_SANITIZE_EMAIL);//$_POST['utilizador'];
$confirm = filter_input(INPUT_POST, "confirmacao", FILTER_SANITIZE_STRING);//$_POST['confirmacao'];

if($newkey != $newkeyc){
    header("location: /retorno.php?result=senhas_invalidas");//ECHO "SENHAS";
} ELSE {
    require ('connection_open.php');
    $sql = "select * from recuperacao where utilizador = '" . $email . "' and confirmacao = '".$confirm."' and data_alteracao is null";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $sql = "update usuarios set senha = sha1($newkey) where email = '$email'";
        $result = mysqli_query($conn, $sql);
        $sql = "update recuperacao set data_alteracao = sysdate() where utilizador = '$email' and confirmacao = '$confirm'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("location: /retorno.php?result=sucesso");//echo "tudo OK!";
    } else {
        mysqli_close($conn);
        header("location: /retorno.php?result=chaves_invalidas");//echo "erro chaves";

    }

}