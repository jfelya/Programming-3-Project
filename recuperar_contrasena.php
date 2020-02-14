<?php
session_start();
include("funciones/sesionActiva.php");
include("funciones/recuperar_contrasena/mostrarError.php");
include("funciones/recuperar_contrasena/idCliente.php");
sesionActiva();
mostrarError1();
mostrarError2();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Recuperación de Contraseña</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/letras_minusculas_recuperar_contrasena.js"></script>
	<script src="javascript/SmoothScroll.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<?php
	if ($puestoCliente && !$puestoRecuperar) {
	?>
		<div class="container-fluid">
			<p class="title">Usuario a recuperar:<br>
				<span class="usertext">
					<?php
					include("conexion.php");
					$id_cliente = $_REQUEST["id_cliente"];
					$sql = "SELECT * FROM usuarios WHERE id_cliente = '$id_cliente'";
					$resultado = $conexion->query($sql);
					$row = $resultado->fetch_assoc();
					echo $row["usuario"];
					?>
				</span>
			</p><br>
			<form method="POST" action="procesos/recuperar_contrasena_proceso.php?con=respuesta_secreta&id_cliente=<?php echo $id_cliente; ?>">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="respuesta_secreta">
						<?php
						echo $row["pregunta_secreta"];
						?>
					</label>
					<div class="col-sm-8">
						<input onkeyup="letraMinuscula3()" class="form-control" id="respuesta_secreta" type="text" name="respuesta_secreta" placeholder="Ingrese su respuesta secreta" autofocus="yes">
					</div>
				</div><br>
				<input class="btn btn-outline-primary btn-block" type="submit" value="Enviar">
				<a class="btn btn-outline-info btn-block" href="recuperar_contrasena.php">Regresar</a>
			</form>
		</div>
	<?php
	} //SI EL ID DEL USUARIO ES CORRECTO
	if ($puestoRecuperar && $recuperarUsuario && !$puestoCliente) {
	?>
		<div class="container-fluid">
			<p class="title">Recuperar con usuario</p><br>
			<form method="POST" action="procesos/recuperar_contrasena_proceso.php?con=usuario">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="usuario">
						Usuario
					</label>
					<div class="col-sm-7">
						<input onkeyup="letraMinuscula1()" class="form-control" id="usuario" type="text" name="usuario" placeholder="Ingrese su usuario" autofocus="yes">
					</div>
				</div><br>
				<input class="btn btn-outline-primary btn-block" type="submit" value="Enviar">
				<a class="btn btn-outline-info btn-block" href="recuperar_contrasena.php">Regresar</a>
			</form>
		</div>
	<?php
	}
	if ($puestoRecuperar && $recuperarCorreo && !$puestoCliente) {
	?>
		<div class="container-fluid">
			<p class="title">Recuperar con correo</p><br>
			<form method="POST" action="procesos/recuperar_contrasena_proceso.php?con=correo">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="correo">
						Correo
					</label>
					<div class="col-sm-7">
						<input onkeyup="letraMinuscula2()" class="form-control" id="correo" type="correo" name="correo" placeholder="Ingrese su correo" autofocus="yes">
					</div>
				</div><br>
				<input class="btn btn-outline-primary btn-block" type="submit" value="Enviar">
				<a class="btn btn-outline-info btn-block" href="recuperar_contrasena.php">Regresar</a>
			</form>
		</div>
	<?php
	}
	if (!$puestoCliente && !$puestoRecuperar) {
	?>
		<div class="container-fluid">
			<p class="title">Recuperación de Contraseña</p><br>

			<a class="btn btn-outline-secondary btn-block" href="recuperar_contrasena.php?recuperar=usuario">Recuperar con usuario</a>
			<a class="btn btn-outline-secondary btn-block" href="recuperar_contrasena.php?recuperar=correo">Recuperar con correo</a>
			<a class="btn btn-outline-info btn-block" data-toggle="tooltip" data-placement="top" title="Regresar" href="login.php">Regresar</a>
		</div>
	<?php
	}
	?>
</body>

</html>