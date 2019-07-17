<?php
$servername = "axisclientes.mysql.dbaas.com.br";
$database = "axisclientes";
$username = "axisclientes";
$password = "axisbi@19";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database) or die ("Can't connect with the database.");
