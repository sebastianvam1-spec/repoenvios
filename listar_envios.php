<?php

include("conexion.php");

header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM envios");

$envios = [];

while($row = $result->fetch_assoc()){

    $envios[] = $row;

}

echo json_encode($envios, JSON_PRETTY_PRINT);

?>