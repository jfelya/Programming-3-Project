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
	<title>Registrarse</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/SmoothScroll.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="container-fluid">
		<p class="title">Registrarse por primera vez</p>
		<form name="registrarse" action="procesos/registrarse_proceso.php" method="POST">
			<!-- NOMBRE -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label" for="nombre">
					Nombre
				</label>
				<div class="col-sm-7">
					<input class="form-control" id="nombre" type="text" name="nombre" required>
				</div>
				<p class="mini">Máximo 30 caracteres / Mínimo 2 caracteres</p>
			</div>
			<!-- NOMBRE -->
			<!-- APELLIDO -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label" for="apellido">
					Apellido
				</label>
				<div class="col-sm-7">
					<input class="form-control" id="apellido" type="text" name="apellido" required>
				</div>
				<p class="mini">Máximo 30 caracteres / Mínimo 2 caracteres</p>
			</div>
			<!-- APELLIDO -->
			<!-- USUARIO -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label" for="usuario">
					Usuario
				</label>
				<div class="col-sm-7">
					<input onkeyup="letraMinuscula1()" class="form-control" id="usuario" type="text" name="usuario" required>
				</div>
				<p class="mini">Máximo 20 caracteres / Mínimo 4 caracteres</p>
			</div>
			<!-- USUARIO -->
			<!-- CORREO -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label" for="correo">
					Correo
				</label>
				<div class="col-sm-7">
					<input onkeyup="letraMinuscula2()" class="form-control" id="correo" type="correo" name="correo" required>
				</div>
				<p class="mini">Máximo 30 caracteres</p>
			</div>
			<!-- CORREO -->
			<!-- CONTRASEÑA -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label" for="contrasena">
					Contraseña
				</label>
				<div class="col-sm-7">
					<input class="form-control" id="contrasena" type="password" name="contrasena" required>
				</div>
				<p class="mini">Máximo 30 caracteres / Mínimo 4 caracteres</p>
			</div>
			<!-- CONTRASEÑA -->
			<!-- CONFIRMAR CONTRASEÑA -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label" for="contrasena2">
					Confirmar contraseña
				</label>
				<div class="col-sm-7">
					<input class="form-control" id="contrasena2" type="password" name="contrasena2" required>
				</div>
				<p class="mini">Máximo 30 caracteres / Mínimo 4 caracteres</p>
			</div>
			<!-- CONFIRMAR CONTRASEÑA -->
			<!-- NIVEL  -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label" for="nivel">
					Nivel de Usuario
				</label>
				<div class="col-sm-7">
					<select class="form-control" name="nivel" id="nivel">
						<option>Cliente</option>
					</select>
				</div>
			</div>
			<!-- NIVEL  -->
			<!-- PREGUNTA SECRETA -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label" for="pregunta_secreta">
					Pregunta secreta
				</label>
				<div class="col-sm-7">
					<select class="form-control" name="pregunta_secreta" id="pregunta_secreta">
						<option></option>
						<option>Color Favorito</option>
						<option>Comida Favorita</option>
						<option>Banda Favorita</option>
						<option>Animal Favorito</option>
					</select>
				</div>
			</div>
			<!-- PREGUNTA SECRETA -->
			<!-- RESPUESTA SECRETA -->
			<div class="form-group row">
				<label class="col-sm-4 col-form-label" for="respuesta_secreta">
					Respuesta secreta
				</label>
				<div onkeyup="letraMinuscula3()" class="col-sm-7">
					<input class="form-control" id="respuesta_secreta" type="text" name="respuesta_secreta" required>
				</div>
				<p class="mini">Máximo 30 caracteres / Mínimo 2 caracteres</p>
			</div>
			<!-- RESPUESTA SECRETA -->
			<input class="btn btn-outline-primary btn-block" type="submit" name="boton_registrar" value="Registrar" .disabled><br>
			<a class="btn btn-outline-info" role="button" .disabled href="login.php">Regresar</a>

		</form>
	</div>
</body>

</html>