<?php

include("conexion.php");

$id = $_POST['id'];
$estado = $_POST['estado'];

$sql = "UPDATE envios
SET estado='$estado'
WHERE id=$id";

$conn->query($sql);

echo "Estado actualizado";

?>