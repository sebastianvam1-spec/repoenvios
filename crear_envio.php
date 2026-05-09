<?php

include("conexion.php");

$codigo = "ENV-" . rand(1000,9999);

$remitente    = $_POST['remitente'];
$destinatario = $_POST['destinatario'];
$direccion    = $_POST['direccion'];
$ciudad       = $_POST['ciudad'];
$estado       = $_POST['estado'];

$sql = "INSERT INTO envios
(codigo, remitente, destinatario, direccion, ciudad, estado)

VALUES

('$codigo','$remitente','$destinatario','$direccion','$ciudad','$estado')";

$conn->query($sql);

header("Location: index.php");

?>