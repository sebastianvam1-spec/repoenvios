<?php

$host = "ftp-clasebraian.alwaysdata.net";
$user = "clasebraian";
$pass = "BRAIAN123";
$db   = "clasebraian_gestionusuarios";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>  