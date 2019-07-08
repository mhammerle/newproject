<?php
$path_parts = pathinfo(__FILE__);
$_SESSION['nm_page'] = $path_parts['basename'];
include('app-assets/functions/restrito.php')
?>
<script>
    function toogleActive() {
        document.getElementById("nav_power_bi").classList.add("active");
        document.getElementById("header_page").innerHTML = "<h3>Power BI</h3>";
    }

    toogleActive();
</script>

<div class="alert alert-info alert-dismissible fade show" role="alert">
    Faça Login na sua conta do PowerBi para visualizar seu relatório<br>
    Seu e-mail cadastrado é: <b>  <?php
        $em_usr = $_SESSION['email_usr'];
        $em_usr = strtolower($em_usr);
        echo "$em_usr"
        ?>
    </b>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>


</div>

<br>
<div style="border: 1px solid black;height: 600px;">
    <iframe width="100%" height="100%"
            src="https://app.powerbi.com/view?r=eyJrIjoiMjk5NDg0ODgtY2FkYy00OTY1LTg4MWEtMjIyZmVjMDYxNDcyIiwidCI6ImNmNzJlMmJkLTdhMmItNDc4My1iZGViLTM5ZDU3YjA3Zjc2ZiIsImMiOjR9"
            frameborder="0" allowFullScreen="true" id="powerbi"></iframe>
</div>
<br><br><br>
<script>
    /* Get the element you want displayed in fullscreen mode (a video in this example): */
    var elem = document.getElementById("powerbi");

    /* When the openFullscreen() function is executed, open the video in fullscreen.
    Note that we must include prefixes for different browsers, as they don't support the requestFullscreen method yet */
    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
        }
    }
</script>

