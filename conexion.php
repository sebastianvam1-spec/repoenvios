<?php

$host = "mysql-claseapi.alwaysdata.net";
$user = "claseapi";
$pass = "clase1234";
$db   = "claseapi_gestionusuarios";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>