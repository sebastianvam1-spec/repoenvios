<?php

<<<<<<< HEAD
$host = "mysql-clasebraian.alwaysdata.net";
=======
$host = "ftp-clasebraian.alwaysdata.net";
>>>>>>> 1287a4bac9d54e09adb4065bcfd4772720fb21d4
$user = "clasebraian";
$pass = "BRAIAN123";
$db   = "clasebraian_gestionusuarios";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>  