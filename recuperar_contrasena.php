<!DOCTYPE html>
<html>
<head>
	<title>Recuperación de Contraseña</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="guayucostyles.css">
	<script src="letras_minusculas_recuperar_contrasena.js"></script>
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
		if (isset($_SESSION["mensaje"]) and isset($_REQUEST["error"]))
		{
			if ($_SESSION["mensaje"] !== "" and $_REQUEST["error"] == 1)
			{
				echo "<script>alert('".$_SESSION["mensaje"]."')</script>";
				unset($_SESSION["mensaje"]);
			} //SI HAY ERRORES
		} //SI LOS ERRORES ESTÁN PUESTOS
		// ERROR
		if (isset($_REQUEST["usuario_id"]) and !isset($_REQUEST["recuperar"]))
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
				<form method="POST" action="recuperar_contrasena_proceso.php?con=respuesta_secreta&usuario_id=<?php echo $usuario_id; ?>">
					<div class="form-group">
						<label class="col-sm-2 col-form-label" for="respuesta_secreta">
							<?php
							echo $row["pregunta_secreta"];
							?>
						</label>
						<div class="col-sm-11">
							<input onkeyup="letraMinuscula3()" class="form-control" id="respuesta_secreta" type="text" name="respuesta_secreta" placeholder="Ingrese su respuesta secreta" autofocus="yes">
						</div>
					</div><br>
					<input class="btn btn-outline-primary btn-block" type="submit" value="Enviar">
					<a class="btn btn-outline-secondary btn-block" data-toggle="tooltip" data-placement="top" title="Regresar"  href="recuperar_contrasena.php">Regresar</a>
				</form>
			</div>
			<?php
		} //SI EL ID DEL USUARIO ES CORRECTO
		if (isset($_REQUEST["recuperar"]) and $_REQUEST["recuperar"] == "usuario" and !isset($_REQUEST["usuario_id"]))
		{
			?>
			<div class="userbox">
				<p class="title">Recuperar con usuario</p>
				<form method="POST" action="recuperar_contrasena_proceso.php?con=usuario">
					<div class="form-group">
						<label class="col-sm-2 col-form-label" for="usuario">
							Usuario
						</label>
						<div class="col-sm-11">
							<input onkeyup="letraMinuscula1()" class="form-control" id="usuario" type="text" name="usuario" placeholder="Ingrese su usuario" autofocus="yes">
						</div>
					</div><br>
					<input class="btn btn-outline-primary btn-block" type="submit" value="Enviar">
					<a class="btn btn-outline-secondary btn-block" data-toggle="tooltip" data-placement="top" title="Regresar"  href="recuperar_contrasena.php">Regresar</a>
				</form>		
			</div>
			<?php
		}
		if (isset($_REQUEST["recuperar"]) and $_REQUEST["recuperar"] == "correo" and !isset($_REQUEST["usuario_id"]))
		{
			?>
			<div class="userbox">
				<p class="title">Recuperar con correo</p>
				<form method="POST" action="recuperar_contrasena_proceso.php?con=correo">
					<div class="form-group">
						<label class="col-sm-2 col-form-label" for="correo">
							Correo
						</label>
						<div class="col-sm-11">
							<input onkeyup="letraMinuscula2()" class="form-control" id="correo" type="correo" name="correo" placeholder="Ingrese su correo"  autofocus="yes">
						</div>
					</div><br>
					<input class="btn btn-outline-primary btn-block" type="submit" value="Enviar">
					<a class="btn btn-outline-secondary btn-block" data-toggle="tooltip" data-placement="top" title="Regresar"  href="recuperar_contrasena.php">Regresar</a>
				</form>
			</div>
			<?php
		}
		if (!isset($_REQUEST["usuario_id"]) and !isset($_REQUEST["recuperar"]))
		{
			?>
			<div class="userbox">
				<p class="title">Recuperación de Contraseña</p>

				<a class="btn btn-outline-info btn-block" href="recuperar_contrasena.php?recuperar=usuario">Recuperar con usuario</a>
				<a class="btn btn-outline-info btn-block" href="recuperar_contrasena.php?recuperar=correo">Recuperar con correo</a><br><br>			
				<a class="btn btn-outline-secondary btn-block" data-toggle="tooltip" data-placement="top" title="Regresar"  href="login.php">Regresar</a>
			</div>
			<?php
		}
	}
	?>
</body>
</html>