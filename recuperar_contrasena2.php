<!DOCTYPE html>
<html>
<head>
	<title>Recuperación de Contraseña 2</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="guayucostyles.css">
</head>
<body>
	<?php
	session_start();
	if (isset($_SESSION["usuario"]) and $_SESSION["sesion_activa"] == True)
	{
		header("Location:mainpage.php");
} //SI HAY SESION
else
{
	// ERROR
	if (isset($_SESSION["mensaje"]) and isset($_REQUEST["error2"]))
	{
		if ($_SESSION["mensaje"] !== "" and $_REQUEST["error2"] == 1)
		{
			echo "<script>alert('".$_SESSION["mensaje"]."')</script>";
			unset($_SESSION["mensaje"]);
			} //SI HAY ERRORES
		} //SI LOS ERRORES ESTÁN PUESTOS
		// ERROR
		if (!isset($_REQUEST["usuario_id"]) and !isset($_SESSION["cambiar_contrasena"]) and $_SESSION["cambiar_contrasena"] == FALSE)
		{
			header("Location:cerrar_sesion.php");
		}
		else
		{
			$usuario_id = $_REQUEST["usuario_id"];
			include("conexion.php");
			$sql = "SELECT * FROM usuarios WHERE usuario_id = '$usuario_id'";
			$resultado = $conexion->query($sql);
			$row = $resultado->fetch_assoc();
			?>
			<div class="userbox">
				<p style="color: silver;">Usuario:  
					<span class="usertext">
						<?php 
						echo $row["usuario"];
						?>
					</span>
				</p>
				<p class="mini">Todos los campos son obligatorios<br>
				Máximo 20 caracteres / Mínimo 2 caracteres</p>
				<form method="POST" action="recuperar_contrasena2_proceso.php?usuario_id=<?php echo $usuario_id;?>">
					<!-- CONTRASEÑA -->
					<div class="form-group">
						<label class="col-sm-2 col-form-label" for="contrasena">
							Nueva contraseña
						</label>
						<div class="col-sm-13">
							<input class="form-control" id="contrasena" type="password" name="contrasena" placeholder="Ingrese su nueva contraseña">
						</div>
					</div>
					<!-- CONTRASEÑA -->
					<!-- CONFIRMAR CONTRASEÑA -->
					<div class="form-group">
						<label class="col-sm-2 col-form-label" for="contrasena2">
							Confirmar nueva contraseña
						</label>
						<div class="col-sm-13">
							<input class="form-control" id="contrasena2" type="password" name="contrasena2" placeholder="Confirme su nueva contraseña">
						</div>
					</div><br>
					<input class="btn btn-outline-primary btn-block" type="submit" value="Enviar">
					<a class="btn btn-outline-secondary btn-block" data-toggle="tooltip" data-placement="top" title="Regresar"  href="recuperar_contrasena.php">Regresar</a>
				</form>
			</div>
			<!-- CONFIRMAR CONTRASEÑA -->
			<?php
		}
	}
	?>
</body>
</html>