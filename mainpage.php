<?php
session_start();
include("funciones/mostrarProductosMainpage.php");
include("funciones/sesionInactiva.php");
sesionInactiva();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Página Principal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/SmoothScroll.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
		<div class="mainbox">
			<p class="title">Página Principal de Equipate Full</p>
			<p style="color: silver;">Cliente: 
				<span class="usertext">
					<?php 
					echo $_SESSION["usuario"];
					?>
				</span>
			</p>
			<table class="table table-dark table-hover">
				<thead>
					<tr>
						<th class="tabletitletitle" colspan="9">
							Lista de productos
						</th>
					</tr>
				</thead>
				<tbody style="color: #A4978E;">
					<tr>
						<th class="tabletitle">
							Nombre
						</th>
						<th class="tabletitle">
							Stock
						</th>
						<th class="tabletitle">
							Precio
						</th>
						<th colspan="2" class="tabletitle">
							Carrito
						</th>
					</tr>
					<?php
					mostrarProductosMainpage();
					?>
				</tbody>
			</table>
			<a class="btn btn-outline-secondary" href="ver_carrito.php">Ver Carrito</a>
			<a class="btn btn-outline-secondary" href="ver_facturas.php">Ver Facturas</a><br><br>
			<a class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Cerrar la sesión"  href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
		</div>
	</center>
</body>
</html>