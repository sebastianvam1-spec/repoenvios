<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FastDelivery - Sistema de Envíos</title>

<link rel="stylesheet" href="estilos.css">

<!-- ICONOS -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">

<div class="logo">
<i class="fa-solid fa-truck-fast"></i>
FastDelivery
</div>

<ul>

<li><a href="#">Inicio</a></li>
<li><a href="#">Envíos</a></li>
<li><a href="#">Rastreo</a></li>
<li><a href="#">API</a></li>

</ul>

</nav>

<!-- HERO -->

<section class="hero">

<div class="hero-text">

<h1>Gestión Profesional de Envíos</h1>

<p>
Controla, registra y rastrea paquetes en tiempo real
con una interfaz moderna y rápida.
</p>

</div>

</section>

<!-- CONTENIDO -->

<section class="contenedor">

<!-- FORMULARIO -->

<div class="card">

<h2><i class="fa-solid fa-box"></i> Registrar Envío</h2>

<form action="crear_envio.php" method="POST">

<input type="text"
name="remitente"
placeholder="Nombre remitente"
required>

<input type="text"
name="destinatario"
placeholder="Nombre destinatario"
required>

<input type="text"
name="direccion"
placeholder="Dirección"
required>

<input type="text"
name="ciudad"
placeholder="Ciudad"
required>

<select name="estado">

<option>Pendiente</option>
<option>En camino</option>
<option>Entregado</option>

</select>

<button type="submit">

<i class="fa-solid fa-paper-plane"></i>
Guardar Envío

</button>

</form>

</div>

<!-- TABLA -->

<div class="card">

<div class="top-table">

<h2><i class="fa-solid fa-list"></i> Lista de Envíos</h2>

<input type="text"
id="buscar"
placeholder="Buscar envío...">

</div>

<table>

<tr>

<th>Código</th>
<th>Remitente</th>
<th>Ciudad</th>
<th>Estado</th>
<th>Fecha</th>
<th>Eliminar</th>

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

<i class='fa-solid fa-trash'></i>

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