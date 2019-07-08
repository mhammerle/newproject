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

    #utilizador, #confirmacao{
        display: none;
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

        <div class="form-label-group">
            <?php
            if($_GET['result'] == 'chaves_invalidas'){
                echo "
                        <div class='alert alert-danger text-center' role='alert' id='divZoom'>
                          Dados inválidos ou essa chave já foi utilizada para alterar uma senha. Tente solicita uma nova.
                          Caso o erro persista, entre em contato.<hr>
                          <button type='button' class='btn btn-outline-primary' onclick='atualizar()'>Voltar</button> 
                        </div>                               
                      ";
            }elseif($_GET['result'] == 'senhas_invalidas'){
                echo "
                        <div class='alert alert-danger text-center' role='alert' id='divZoom'>
                          As senhas digitadas não batem. Tente novamente.
                          Caso o erro persista, entre em contato.<hr>
                          <button type='button' class='btn btn-outline-primary' onclick='atualizar()'>Voltar</button> 
                        </div>                               
                      ";
            } elseif ($_GET['result'] == 'sucesso'){
                echo "
                        <div class='alert alert-sucess text-center' role='alert' id='divZoom'>
                          Senha alterada com sucesso! Clique no botão abaixo para acessar o painel.<hr>
                          <button type='button' class='btn btn-outline-primary' onclick='voltar()'>Ir para o Login</button> 
                        </div>                               
                      ";
            }
            ?>

</body>
</html>
