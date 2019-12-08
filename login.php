<?php
session_start();
if (isset($_REQUEST["error"]) and isset($_REQUEST["error"]))
{
	if ($_SESSION["error"] !== "" and $_REQUEST["error"] == 1)
	{
		echo "<script>alert('".$_SESSION["error"]."')</script>";
		unset($_SESSION["error"]);
	} //SI NO HAY ERRORES
} //SI LOS ERRORES ESTÁN PUESTOS

//EXITO CON LA CONTRASEÑA
if (isset($_REQUEST["exito"]))
{
	if ($_SESSION["recuperar_exito"] !== "" and $_REQUEST["exito"] == 1)
	{
		echo "<script>alert('".$_SESSION["recuperar_exito"]."')</script>";
		unset($_SESSION["recuperar_exito"]);
	}
}
//EXITO CON LA CONTRASEÑA

if (isset($_SESSION["usuario"]) and $_SESSION["sesion_activa"] == True)
{
	header("Location:mainpage.php");
} //SI NO HAY SESION O NO ES ADMIN
else
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Guayuco Digital Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrapguayuco.css">
		<link rel="stylesheet" type="text/css" href="guayucostyles.css">
	</head>
	<body>
		<div class="loginbox">
			<p class="title">Bienvenido al Guayuco Digital</p>
			<form action="login_proceso.php" method="post">
				<div class="form-group">
					<label for="usuario">Usuario</label>
					<input class="form-control" id="usuario" type="text" name="usuario" autofocus="yes">
				</div>
				<div class="form-group">
					<label for="contrasena">Contraseña</label>
					<input class="form-control" id="contrasena" type="password" name="contrasena">
					<a class="links" href="recuperar_contrasena.php">Olvidé mi contraseña</a>
				</div>
				<input class="btn btn-outline-primary btn-block" data-toggle="tooltip" data-placement="top" title="Ingresar a la página" type="submit" name="ingresarBtn" value="Ingresar">
			</form>
			<?php
		}
		?>
	</div>
</body>
</html>