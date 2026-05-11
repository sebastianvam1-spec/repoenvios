<?php

$host = "mysql-stiven.alwaysdata.net";
$user = "stiven";
$pass = "clase1234";
$db   = "stiven_gestionusuarios";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>  