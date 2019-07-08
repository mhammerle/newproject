<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
    body {
        background-image: url("assets/images/bigdata.jpeg");
        height: 100%;
        width: 100%;
        background-size: cover;
    }

    #divZoom {
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 25%;
        margin-bottom: 25%;
        height: 50%;
        width: 40%;
        padding: 20px;
        border: 1px solid #3dd1ff;
        background-color: white;
        border-radius: 2%;
        transition: transform .2s;
    }

    #divZoom:hover {
        transform: scale(1.2);
    }
</style>

<script>
    function atualizar() {
        window.location.replace("lembrar_senha.php");
    }
    function voltar() {
        window.location.replace("acess.php");
    }


</script>


<body>

<?php
if (!empty($_POST)) {
    include('assets/functions/connection_open.php');
    require('assets/PHPMailer/PHPMailerAutoload.php');
    require('assets/PHPMailer/class.smtp.php');

    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->SMTPDebug = 0;
    $mailer->IsHTML(true);
    $mailer->CharSet = 'UTF-8';
    $mailer->SMTPAuth = true;
    $mailer->Host = 'email-ssl.com.br';
    $mailer->Port = 587;
    $mailer->Username = 'noreply@axisbi.com.br';
    $mailer->Password = 'Axisbi@19';
    $mailer->From = 'noreply@axisbi.com.br';
    $mailer->FromName = 'Redefinir Senha AxisBI';
    $mailer->Subject = 'Redefinição de senha.';


    $usuario_email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    $sql = "select email from usuarios where upper(email) = upper('$usuario_email')";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // o utilizador existe, vamos gerar um link único e enviá-lo para o e-mail
        // gerar a chave
        // exemplo adaptado de http://snipplr.com/view/20236/
        $chave = sha1(uniqid(mt_rand(), true));
        // guardar este par de valores na tabela para confirmar mais tarde
        $sql = "insert into recuperacao(utilizador, confirmacao, data_solicitacao) values (lower('$usuario_email'), '$chave',sysdate())";


        $conf = mysqli_query($conn, $sql);

        if ($conf) {
            $link = "http://www.axisbi.com.br/redefinir.php?utilizador=$usuario_email&confirmacao=$chave";
            $mailer->Body = 'Olá! Para redefinir sua senha, acesse o link: ' . $link;
            $mailer->AddAddress($usuario_email);
            mysqli_close($conn);

            if ($mailer->Send()) {
                echo "
                        <div class='alert alert-success text-center' role='alert' id='divZoom'>
                          Email enviado com sucesso! Acesse sua caixa de entrada para recuperar a sua senha.<hr>
                          <button type='button' class='btn btn-outline-primary' onclick='voltar()'>Voltar para o Login.</button> 
                        </div>                               
                      ";
            } else {
                echo "
                        <div class='alert alert-danger text-center' role='alert' id='divZoom'>
                          Ocorreu algum erro no envio do e-mail. Tente novamente mais tarde. Se o problema
                          persistir, entre em contato conosco.<hr>
                          <button type='button' class='btn btn-outline-primary' onclick='atualizar()'>Tentar Novamente</button> 
                        </div>                               
                      ";
            }

        } else {
            echo "
                        <div class='alert alert-danger text-center' role='alert' id='divZoom'>
                          Não foi possível gerar uma chave de recuperação no momento. Tente novamente mais tarde. Se o problema
                          persistir, entre em contato conosco.<hr>
                          <button type='button' class='btn btn-outline-primary' onclick='atualizar()'>Tentar Novamente</button> 
                        </div>                               
                      ";

        }
    } else {
        unset($_POST) ;
        echo "
                        <div class='alert alert-danger text-center' role='alert' id='divZoom'>
                          E-mail não localizado no nosso cadastro. Certifique-se que está digitando corretamente. Se o problema
                          persistir, entre em contato conosco. <hr>
                          <button type='button' class='btn btn-outline-primary' onclick='atualizar()'>Tentar Novamente</button>    
                        </div>  
                                              
                      ";
    }
} else {
    // mostrar formulário de recuperação
    ?>
    <div class="text-center" id="divZoom">
        <h2>Digite o seu e-mail abaixo para iniciar o processo de recupração da sua senha.</h2><br>
        <form method="post">
            <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control"
                       placeholder="Digite aqui o seu e-mail" required autofocus>
            </div>
            <hr>
            <input type="submit" class="btn btn-success btn-lg btn-block" value="Recuperar a sua senha."/>
        </form>
    </div>
    <?php
}
?>


</body>


</html>
