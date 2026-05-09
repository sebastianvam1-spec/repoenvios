<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistema de Envíos</title>

<link rel="stylesheet" href="estilos.css">

</head>

<body>

<header>

<h1>📦 Sistema de Envíos</h1>
<p>API Profesional de Gestión de Paquetes</p>

</header>

<section class="contenedor">

<div class="card">

<h2>Registrar Envío</h2>

<form action="crear_envio.php" method="POST">

<input type="text" name="remitente" placeholder="Remitente" required>

<input type="text" name="destinatario" placeholder="Destinatario" required>

<input type="text" name="direccion" placeholder="Dirección" required>

<input type="text" name="ciudad" placeholder="Ciudad" required>

<select name="estado">

<option>Pendiente</option>
<option>En camino</option>
<option>Entregado</option>

</select>

<button type="submit">Guardar Envío</button>

</form>

</div>

<div class="card">

<h2>Lista de Envíos</h2>

<input type="text" id="buscar" placeholder="Buscar envío...">

<table>

<tr>
<th>Código</th>
<th>Remitente</th>
<th>Ciudad</th>
<th>Estado</th>
<th>Fecha</th>
<th>Acción</th>
</tr>

<?php

$result = $conn->query("SELECT * FROM envios ORDER BY id DESC");

while($row = $result->fetch_assoc()){

$estadoClass = "";

if($row['estado'] == "Pendiente"){
    $estadoClass = "pendiente";
}

if($row['estado'] == "En camino"){
    $estadoClass = "camino";
}

if($row['estado'] == "Entregado"){
    $estadoClass = "entregado";
}

echo "

<tr>

<td>{$row['codigo']}</td>

<td>{$row['remitente']}</td>

<td>{$row['ciudad']}</td>

<td>
<span class='$estadoClass'>
{$row['estado']}
</span>
</td>

<td>{$row['fecha']}</td>

<td>
<a class='eliminar'
href='eliminar_envio.php?id={$row['id']}'>
Eliminar
</a>
</td>

</tr>

";

}

?>

</table>

</div>

</section>

<script src="script.js"></script>

</body>
</html>