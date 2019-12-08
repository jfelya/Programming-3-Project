<!DOCTYPE html>
<html>
<head>
	<title>Lista de Usuarios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="guayucostyles.css">
</head>
<?php
session_start();
if (!isset($_SESSION["usuario"]) or $_SESSION["sesion_activa"] == False or $_SESSION["nivel"] !== "admin")
{
	header("Location:cerrar_sesion.php");
} //SI NO HAY SESION O NO ES ADMIN
else
{
	?>
	<body>
		<div class="listbox">
			<table class="table table-dark table-hover">
				<thead>
					<tr>
						<th style="font-size: 30px; color: turquoise;" class="title" colspan="9">
							Lista de usuarios
						</th>
					</tr>
				</thead>
				<tbody style="color: silver;">
					<tr>
						<th style="color: crimson;" class="title">
							Usuario
						</th>
						<th style="color: crimson;" class="title">
							Correo
						</th>
						<th style="color: crimson;" class="title">
							Nivel de Administración
						</th>
						<th style="color: crimson;" class="title">
							Pregunta Secreta
						</th>
						<th style="color: crimson;" class="title">
							Respuesta Secreta
						</th>
						<th style="color: crimson;" class="title" colspan="2">
							Modificaciones
						</th>
					</tr>
					<?php
					include("conexion.php");
					$query = "SELECT * FROM usuarios";
					$resultado = $conexion->query($query);
					while ($row = $resultado->fetch_assoc())
					{
						?>
						<tr>
							<td>
								<?php echo $row['usuario']; ?>
							</td>
							<td>
								<?php echo $row['correo']; ?>
							</td>
							<td>
								<?php echo $row['nivel']; ?>
							</td>
							<td>
								<?php echo $row['pregunta_secreta']; ?>
							</td>
							<td>
								<?php echo $row['respuesta_secreta']; ?>
							</td>
							<td>
								<a href="admin.php?modificar_usuario=1&usuario_id=<?php echo $row['usuario_id']; ?>">Modificar</a>
							</td>
							<td>
								<a href="borrar.php?usuario=<?php echo $row['usuario']; ?>">Eliminar</a>
							</td>							
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<a class="btn btn-outline-secondary btn-block" data-toggle="tooltip" data-placement="top" title="Regresar"  href="admin.php">Regresar</a>
			<a class="btn btn-outline-danger btn-block" data-toggle="tooltip" data-placement="top" title="Cerrar la sesión"  href="cerrar_sesion.php">Cerrar Sesión</a>
		</div>
	</body>
	<?php
}
?>
</html>