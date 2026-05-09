<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FastDelivery PRO</title>

<!-- CSS -->
<link rel="stylesheet" href="estilos.css">

<!-- ICONOS -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- FUENTE -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
rel="stylesheet">

</head>

<body>

<!-- =========================
NAVBAR
========================= -->

<nav class="navbar">

<div class="logo">
Fed<span>Ex</span>
</div>

<ul>
<li><a href="#">Envíos</a></li>
<li><a href="#">Rastreo</a></li>
<li><a href="#">Ayuda</a></li>
<li><a href="#">Cuenta</a></li>
</ul>

</nav>

<!-- =========================
HERO
========================= -->

<section class="hero">

<div class="overlay"></div>

<div class="hero-content">

<h1>
Conectados con el mañana
</h1>

<p>
Gestiona envíos, rastrea paquetes y administra
toda tu logística desde una plataforma moderna,
rápida y profesional.
</p>

<!-- PANEL -->

<div class="panel-rastreo">

<div class="tabs">

<div class="tab">
<i class="fa-solid fa-calculator"></i>
<h3>Tarifas</h3>
</div>

<div class="tab active">
<i class="fa-solid fa-box"></i>
<h3>Rastrea</h3>
</div>

<div class="tab">
<i class="fa-solid fa-truck-fast"></i>
<h3>Envía</h3>
</div>

</div>

<div class="search-box">

<input type="text"
placeholder="ID DE RASTREO">

<button>
TRACK →
</button>

</div>

</div>

</div>

</section>

<!-- =========================
GALERIA
========================= -->

<section class="galeria">

<div class="galeria-card">

<img src="https://images.unsplash.com/photo-1578575437130-527eed3abbec?q=80&w=1200">

<div class="galeria-info">

<h3>Rastreo Inteligente</h3>

<p>
Monitorea paquetes en tiempo real.
</p>

</div>

</div>

<div class="galeria-card">

<img src="https://images.unsplash.com/photo-1605902711622-cfb43c44367f?q=80&w=1200">

<div class="galeria-info">

<h3>Entregas Seguras</h3>

<p>
Control total de distribución y rutas.
</p>

</div>

</div>

<div class="galeria-card">

<img src="https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=1200">

<div class="galeria-info">

<h3>Control Logístico</h3>

<p>
Optimiza procesos y administra envíos.
</p>

</div>

</div>

</section>

<!-- =========================
CONTENEDOR
========================= -->

<section class="contenedor">

<!-- STATS -->

<div class="stats">

<div class="stat-card">

<i class="fa-solid fa-box-open"></i>

<h3>Envíos Totales</h3>

<?php
$total = $conn->query("SELECT * FROM envios")->num_rows;
echo "<h1>$total</h1>";
?>

</div>

<div class="stat-card">

<i class="fa-solid fa-truck"></i>

<h3>En Camino</h3>

<?php
$camino = $conn->query("SELECT * FROM envios WHERE estado='En camino'")->num_rows;
echo "<h1>$camino</h1>";
?>

</div>

<div class="stat-card">

<i class="fa-solid fa-circle-check"></i>

<h3>Entregados</h3>

<?php
$entregados = $conn->query("SELECT * FROM envios WHERE estado='Entregado'")->num_rows;
echo "<h1>$entregados</h1>";
?>

</div>

</div>

<!-- GRID -->

<div class="grid">

<!-- FORMULARIO -->

<div class="card">

<h2>
<i class="fa-solid fa-paper-plane"></i>
Registrar Envío
</h2>

<form action="crear_envio.php" method="POST">

<div class="input-group">

<label>Remitente</label>

<input type="text"
name="remitente"
required>

</div>

<div class="input-group">

<label>Destinatario</label>

<input type="text"
name="destinatario"
required>

</div>

<div class="input-group">

<label>Dirección</label>

<input type="text"
name="direccion"
required>

</div>

<div class="input-group">

<label>Ciudad</label>

<input type="text"
name="ciudad"
required>

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
Guardar Envío
</button>

</form>

</div>

<!-- TABLA -->

<div class="tabla-card">

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

<table class="tabla-envios">

<thead>

<tr>

<th>Código</th>
<th>Remitente</th>
<th>Ciudad</th>
<th>Estado</th>
<th>Fecha</th>
<th>Eliminar</th>

</tr>

</thead>

<tbody>

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

<td class='codigo'>{$row['codigo']}</td>

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

</tbody>

</table>

</div>

</div>

</div>

</section>

</body>
</html>