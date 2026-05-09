<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FastDelivery Ultra</title>

<link rel="stylesheet" href="estilos.css?v=10">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
rel="stylesheet">

</head>

<body>

<!-- HERO -->

<section class="hero">

<div class="overlay"></div>

<div class="hero-content">

<h1>
Sistema Inteligente de Envíos
</h1>

<p>
Gestiona paquetes, controla entregas y administra
toda tu logística desde una plataforma moderna
y profesional.
</p>

<!-- BUSCADOR -->

<div class="hero-search">

<input type="text"
placeholder="Ingresa ID de rastreo">

<button>
Rastrear
</button>

</div>

</div>

</section>

<!-- DASHBOARD -->

<section class="dashboard">

<!-- ESTADISTICAS -->

<div class="stats">

<div class="stat-card glass">

<i class="fa-solid fa-boxes-stacked"></i>

<h2>

<?php
$total = $conn->query("SELECT * FROM envios")->num_rows;
echo $total;
?>

</h2>

<p>Envíos Totales</p>

</div>

<div class="stat-card glass">

<i class="fa-solid fa-truck"></i>

<h2>

<?php
$camino = $conn->query("SELECT * FROM envios WHERE estado='En camino'")->num_rows;
echo $camino;
?>

</h2>

<p>En Camino</p>

</div>

<div class="stat-card glass">

<i class="fa-solid fa-circle-check"></i>

<h2>

<?php
$entregados = $conn->query("SELECT * FROM envios WHERE estado='Entregado'")->num_rows;
echo $entregados;
?>

</h2>

<p>Entregados</p>

</div>

</div>

<!-- GRID -->

<div class="main-grid">

<!-- FORM -->

<div class="form-card glass">

<h2>
<i class="fa-solid fa-paper-plane"></i>
Registrar Envío
</h2>

<form action="crear_envio.php" method="POST">

<input type="text"
name="remitente"
placeholder="Remitente"
required>

<input type="text"
name="destinatario"
placeholder="Destinatario"
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
Guardar Envío
</button>

</form>

</div>

<!-- TABLA -->

<div class="table-card glass">

<div class="table-header">

<h2>
<i class="fa-solid fa-list"></i>
Lista de Envíos
</h2>

<input type="text"
placeholder="Buscar envío...">

</div>

<div class="table-container">

<table>

<thead>

<tr>

<th>Código</th>
<th>Remitente</th>
<th>Ciudad</th>
<th>Estado</th>
<th>Eliminar</th>

</tr>

</thead>

<tbody>

<?php

$result = $conn->query("SELECT * FROM envios ORDER BY id DESC");

while($row = $result->fetch_assoc()){

$estadoClass = "";

if($row['estado']=="Pendiente"){
$estadoClass = "pendiente";
}

if($row['estado']=="En camino"){
$estadoClass = "camino";
}

if($row['estado']=="Entregado"){
$estadoClass = "entregado";
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

<td>

<a class='delete-btn'
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