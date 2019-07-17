<script>
    function toogleActive() {
        document.getElementById("nav_home").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Bem vindo!</h3>";
    }

    toogleActive();
</script>
<?php $_SESSION["page"] = "Home" ?>
<br>
<br>
<div id="main_body">
<!-- Inicio do BODY -->
<iframe width="100%" height="600px" src="https://www.youtube.com/embed/5KZWsBWeDc8?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<!-- Fim do BODY -->
</div>