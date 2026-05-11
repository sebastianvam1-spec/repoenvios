<?php

include("conexion.php");

$id = $_GET['id'];

$resultado = $conn->query("
SELECT * FROM envios
WHERE id=$id
");

$row = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Editar Envío</title>

<link rel="stylesheet" href="estilos.css?v=100">

</head>

<body>

<section class="edit-page">

<div class="edit-card glass">

<h1>
Editar Envío
</h1>

<form action="actualizar_envio.php" method="POST">

<input type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<input type="text"
name="remitente"
value="<?php echo $row['remitente']; ?>"
required>

<input type="text"
name="destinatario"
value="<?php echo $row['destinatario']; ?>"
required>

<input type="text"
name="direccion"
value="<?php echo $row['direccion']; ?>"
required>

<input type="text"
name="ciudad"
value="<?php echo $row['ciudad']; ?>"
required>

<select name="estado">

<option value="Pendiente"
<?php if($row['estado']=="Pendiente") echo "selected"; ?>>
Pendiente
</option>

<option value="En camino"
<?php if($row['estado']=="En camino") echo "selected"; ?>>
En camino
</option>

<option value="Entregado"
<?php if($row['estado']=="Entregado") echo "selected"; ?>>
Entregado
</option>

</select>

<button type="submit">
Actualizar Envío
</button>

</form>

</div>

</section>

</body>
</html>