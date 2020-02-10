<?php
session_start();
include("funciones/sesionInactiva.php");
sesionInactiva();
include("funciones/verCarrito.php");
include("funciones/verPrecioTotal.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ver Carrito</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/SmoothScroll.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
		<div class="carritobox">
			<p class="title">Carrito de: <span class="usertext">
				<?php 
				echo $_SESSION["usuario"];
				?>
			</span>
		</p>
		<?php
		if (isset($_SESSION["carrito"])) {
			if ($_SESSION["carrito"][0] != "") {
				verCarrito();
				calcularPrecioTotal();
				verPrecioTotal();
			} else {
				header("Location:procesos/vaciar_carrito.php");
			}
			?>
			<br><a class="btn btn-outline-primary"  href="procesos/compra_proceso.php?compra">Proceder a comprar</a>
			<a class="btn btn-outline-secondary"  href="mainpage.php">Regresar</a><br><br>
			<a class="btn btn-outline-info" href="procesos/vaciar_carrito.php">Vaciar Carrito</a>
			<a class="btn btn-outline-danger" href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
			<?php
		} else {
			?>
			<p>Actualmente no tienes ningún artículo agregado a tu carrito</p><br>
			<a class="btn btn-outline-secondary"  href="mainpage.php">Regresar</a>
			<a class="btn btn-outline-danger" href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
			<?php
		}
		?>
	</div>
</center>
</body>
</html>