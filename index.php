<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FastDelivery PRO</title>

<link rel="stylesheet" href="estilos.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<!-- =========================
NAVBAR
========================= -->

<nav class="navbar">

<div class="logo">
<i class="fa-solid fa-truck-fast"></i>
FastDelivery
</div>

<ul>
<li><a href="#">Inicio</a></li>
<li><a href="#">Envíos</a></li>
<li><a href="#">Rastreo</a></li>
<li><a href="#">Dashboard</a></li>
</ul>

</nav>

<!-- =========================
HERO
========================= -->

<section class="hero">

<div class="overlay"></div>

<div class="hero-content">

<h1>
Gestión Inteligente de
<span>Envíos y Paquetes</span>
</h1>

<p>
Administra entregas, rastrea paquetes y controla
envíos en tiempo real desde una plataforma moderna.
</p>

<div class="hero-buttons">

<a href="#panel" class="btn btn-primary">
<i class="fa-solid fa-box"></i>
Comenzar
</a>

<a href="listar_envios.php" class="btn btn-secondary">
<i class="fa-solid fa-code"></i>
Ver API
</a>

</div>

</div>

</section>

<!-- =========================
SECCION IMAGENES
========================= -->

<section class="galeria">

<div class="galeria-card">

<img src="https://images.unsplash.com/photo-1578575437130-527eed3abbec?q=80&w=1200">

<div class="galeria-info">
<h3>Rastreo en Tiempo Real</h3>
<p>Visualiza el estado de tus paquetes instantáneamente.</p>
</div>

</div>

<div class="galeria-card">

<img src="https://images.unsplash.com/photo-1605902711622-cfb43c44367f?q=80&w=1200">

<div class="galeria-info">
<h3>Entregas Seguras</h3>
<p>Gestión avanzada y segura de envíos.</p>
</div>

</div>

<div class="galeria-card">

<img src="https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=1200">

<div class="galeria-info">
<h3>Control Logístico</h3>
<p>Optimiza procesos de distribución y transporte.</p>
</div>

</div>

</section>

<!-- =========================
PANEL
========================= -->

<section class="contenedor" id="panel">

<!-- STATS -->

<div class="stats">

<div class="stat-card">

<i class="fa-solid fa-box-open"></i>

<div>
<h3>Envíos Totales</h3>

<?php
$total = $conn->query("SELECT * FROM envios")->num_rows;
echo "<h1>$total</h1>";
?>

</div>

</div>

<div class="stat-card">

<i class="fa-solid fa-truck"></i>

<div>
<h3>En Camino</h3>

<?php
$camino = $conn->query("SELECT * FROM envios WHERE estado='En camino'")->num_rows;
echo "<h1>$camino</h1>";
?>

</div>

</div>

<div class="stat-card">

<i class="fa-solid fa-circle-check"></i>

<div>
<h3>Entregados</h3>

<?php
$entregados = $conn->query("SELECT * FROM envios WHERE estado='Entregado'")->num_rows;
echo "<h1>$entregados</h1>";
?>

</div>

</div>

</div>

<!-- GRID -->

<div class="grid">

<!-- FORM -->

<div class="card">

<h2>
<i class="fa-solid fa-paper-plane"></i>
Registrar Envío
</h2>

<form action="crear_envio.php" method="POST">

<div class="input-group">
<label>Remitente</label>
<input type="text" name="remitente" required>
</div>

<div class="input-group">
<label>Destinatario</label>
<input type="text" name="destinatario" required>
</div>

<div class="input-group">
<label>Dirección</label>
<input type="text" name="direccion" required>
</div>

<div class="input-group">
<label>Ciudad</label>
<input type="text" name="ciudad" required>
</div>

<div class="input-group">
<label>Estado</label>

<select name="estado">

<option>Pendiente</option>
<option>En camino</option>
<option>Entregado</option>

</select>

</div>

<button type="submit">

<i class="fa-solid fa-floppy-disk"></i>
Guardar Envío

</button>

</form>

</div>

<!-- TABLA -->

<div class="card">

<div class="top-table">

<h2>
<i class="fa-solid fa-list"></i>
Lista de Envíos
</h2>

<input type="text"
id="buscar"
placeholder="Buscar envío...">

</div>

<div class="table-container">

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

if($row['estado']=="Pendiente"){
    $estadoClass="pendiente";
}

if($row['estado']=="En camino"){
    $estadoClass="camino";
}

if($row['estado']=="Entregado"){
    $estadoClass="entregado";
}

echo "

<tr>

<td>{$row['codigo']}</td>

<td>{$row['remitente']}</td>

<td>{$row['ciudad']}</td>

<td>
<span class='estado $estadoClass'>
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

</div>

</div>

</section>

<script src="script.js"></script>

</body>
</html>