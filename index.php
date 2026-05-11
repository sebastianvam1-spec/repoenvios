<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FastDelivery Ultra</title>

<link rel="stylesheet" href="estilos.css?v=100">

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
toda tu logística desde una plataforma moderna STIFLEN.
</p>

<div class="hero-search">

<form action="index.php" method="GET">

<input type="text"
name="buscar_codigo"
placeholder="Ingresa ID de rastreo"
required>

<button type="submit">
Rastrear
</button>

</form>

</div>

</div>

</section>

<!-- RASTREO -->

<?php

if(isset($_GET['buscar_codigo'])){

$codigoBuscar = $_GET['buscar_codigo'];

$consulta = $conn->query("
SELECT * FROM envios
WHERE codigo='$codigoBuscar'
");

if($consulta->num_rows > 0){

$row = $consulta->fetch_assoc();

echo "

<div class='rastreo-box'>

<h2>
Resultado del Rastreo
</h2>

<div class='rastreo-grid'>

<div class='rastreo-item'>
<h3>Código</h3>
<p>{$row['codigo']}</p>
</div>

<div class='rastreo-item'>
<h3>Remitente</h3>
<p>{$row['remitente']}</p>
</div>

<div class='rastreo-item'>
<h3>Destinatario</h3>
<p>{$row['destinatario']}</p>
</div>

<div class='rastreo-item'>
<h3>Ciudad</h3>
<p>{$row['ciudad']}</p>
</div>

<div class='rastreo-item'>
<h3>Dirección</h3>
<p>{$row['direccion']}</p>
</div>

<div class='rastreo-item'>
<h3>Estado</h3>
<span class='estado-rastreo'>
{$row['estado']}
</span>
</div>

</div>

</div>

";

}else{

echo "

<div class='rastreo-error'>
No se encontró el envío
</div>

";

}

}

?>

<!-- GALERIA -->

<section class="galeria-envios">

<div class="envio-card">

<img src="https://images.unsplash.com/photo-1605902711622-cfb43c44367f?q=80&w=1200">

<div class="envio-info">

<h3>Entregas Inteligentes</h3>

<p>
Control total de paquetes y distribución.
</p>

</div>

</div>

<div class="envio-card">

<img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=1200">

<div class="envio-info">

<h3>Logística Moderna</h3>

<p>
Administra envíos desde cualquier lugar.
</p>

</div>

</div>

<div class="envio-card">

<img src="https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=1200">

<div class="envio-info">

<h3>Rastreo en Tiempo Real</h3>

<p>
Monitorea entregas con precisión.
</p>

</div>

</div>

</section>

<!-- DASHBOARD -->

<section class="dashboard">

<!-- STATS -->

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

<h2>
Lista de Envíos
</h2>

<div class="table-container">

<table>

<thead>

<tr>

<th>Código</th>
<th>Remitente</th>
<th>Destinatario</th>
<th>Ciudad</th>
<th>Estado</th>
<th>Editar</th>
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

<td>{$row['destinatario']}</td>

<td>{$row['ciudad']}</td>

<td>

<span class='estado $estadoClass'>
{$row['estado']}
</span>

</td>

<td>

<a class='edit-btn'
href='editar_envio.php?id={$row['id']}'>

<i class='fa-solid fa-pen'></i>

</a>

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