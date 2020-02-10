<?php
session_start();
include("funciones/sesionActiva.php");
include("funciones/recuperar_contrasena/mostrarError.php");
include("funciones/recuperar_contrasena/idCliente.php");
sesionActiva();
mostrarError1();
mostrarError2();
// idCliente2();
include("conexion.php");
$id_cliente = $_REQUEST["id_cliente"];
$sql = "SELECT * FROM usuarios WHERE id_cliente = '$id_cliente'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Recuperación de Contraseña 2</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/SmoothScroll.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
		<div class="recuperarboxdos">
			<p class="title">Usuario a recuperar:<br>  
				<span class="usertext">
					<?php 
					echo $row["usuario"];
					?>
				</span>
			</p><br><br>
			<form method="POST" action="procesos/recuperar_contrasena2_proceso.php?id_cliente=<?php echo $id_cliente;?>">
				<!-- CONTRASEÑA -->
				<div class="form-group row">
					<label class="col-sm-4 col-form-label" for="contrasena">
						Nueva contraseña
					</label>
					<div class="col-sm-7">
						<input class="form-control" id="contrasena" type="password" name="contrasena" placeholder="Ingrese su nueva contraseña"  autofocus="yes">
					</div>
				</div>
				<!-- CONTRASEÑA -->
				<!-- CONFIRMAR CONTRASEÑA -->
				<div class="form-group row">
					<label class="col-sm-4 col-form-label" for="contrasena2">
						Confirmar nueva contraseña
					</label>
					<div class="col-sm-7">
						<input class="form-control" id="contrasena2" type="password" name="contrasena2" placeholder="Confirme su nueva contraseña">
					</div>
				</div>
				<p class="mini">Todos los campos son obligatorios<br>
				Máximo 20 caracteres / Mínimo 2 caracteres</p><br>
				<input class="btn btn-outline-primary btn-block" type="submit" value="Enviar">
				<a class="btn btn-outline-info btn-block" data-toggle="tooltip" data-placement="top" title="Regresar"  href="recuperar_contrasena.php">Regresar</a>
			</form>
		</div>
		<!-- CONFIRMAR CONTRASEÑA -->
	</center>
</body>
</html>