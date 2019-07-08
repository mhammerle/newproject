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
    <div class="text-center" id="divZoom">
        <h2>Redefinição de senha.</h2><br>
        <form method="post" action="assets/functions/new_password.php"
              oninput='password.setCustomValidity(cpassword.value != password.value ? "As senhas informadas não são iguais." : "")'>

            <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="Digite sua nova senha." required autofocus><br>
                <input type="password" id="cpassword" name="cpassword" class="form-control"
                       placeholder="Por favor, confirme sua senha." required autofocus>
                <input type="text" id="utilizador" name="utilizador" class="form-control"
                     value="<?php echo $_GET['utilizador'];?>"  >
                <input type="text" id="confirmacao" name="confirmacao" class="form-control"
                       value="<?php echo $_GET['confirmacao'];?>"  >

            </div>
            <hr>
            <input type="submit" class="btn btn-success btn-lg btn-block" value="Alterar senha"/>
        </form>
    </div>
</body>
</html>
