<?php
session_start();
include("funciones/sesionInactiva.php");
include("funciones/funcionesListaProductos.php");
sesionInactiva();
mostrarErrorExito();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Productos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/SmoothScroll.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
		<div class="listabox2"><table class="table table-dark table-hover">
		<table class="table table-dark table-hover">
			<thead>
				<tr>
					<th class="tabletitletitle" colspan="9">
						Lista de productos
					</th>
				</tr>
			</thead>
			<tbody style="color: silver;">
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
					<th class="tabletitle" colspan="2">
						Modificaciones
					</th>
				</tr>
				<?php
				mostrarProductos();
				?>
			</tbody>
		</table>
		<a class="btn btn-outline-info" href="admin.php?registrar_producto">Regresar</a>
		<a class="btn btn-outline-danger"  href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
	</div>
	</center>
</body>
</html>