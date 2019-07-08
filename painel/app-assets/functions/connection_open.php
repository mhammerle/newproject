<?php
$servername = "axisbibd.mysql.dbaas.com.br";
$database = "axisbibd";
$username = "axisbibd";
$password = "axisbi@19";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database) or die ("Can't connect with the database.");
