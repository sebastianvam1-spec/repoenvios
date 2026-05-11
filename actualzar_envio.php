<?php

include("conexion.php");

$id = $_POST['id'];

$remitente = $_POST['remitente'];
$destinatario = $_POST['destinatario'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];

$sql = "

UPDATE envios SET

remitente='$remitente',
destinatario='$destinatario',
direccion='$direccion',
ciudad='$ciudad',
estado='$estado'

WHERE id=$id

";

$conn->query($sql);

header("Location:index.php");

?>