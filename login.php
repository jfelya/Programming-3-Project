<?php
session_start();
include("funciones/validacion_login/mostrarError.php");
include("funciones/validacion_login/mostrarExito.php");
include("funciones/validacion_login/sesionActiva.php");
mostrarError();
mostrarExito();
sesionActiva();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Equipate Full Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
    <link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/SmoothScroll.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container-fluid">
			<p class="title">Bienvenido a <br>Equipate Full</p><br>
			<form action="procesos/login_proceso.php" method="post">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label" for="usuario">Usuario
					</label>
					<div class="col-sm-7">
						<input class="form-control" id="usuario" type="text" name="usuario" autofocus="yes">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label" for="contrasena">Contraseña
					</label>
					<div class="col-sm-7">
						<input class="form-control" id="contrasena" type="password" name="contrasena">
					</div>
				</div>
				<a class="enlaces" href="recuperar_contrasena.php">Olvidé mi contraseña</a> /
				<a class="enlaces" href="registrarse.php">Registrarse</a><br><br>
				<center>
					<input class="btn btn-outline-info btn-block" type="submit" name="ingresarBtn" value="Ingresar">
				</center>
			</form>
	</div>
</body>
</html>