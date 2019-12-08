<?php
session_start();
if (!isset($_SESSION["usuario"]) or $_SESSION["sesion_activa"] == False or $_SESSION["nivel"] !== "cliente")
{
	header("Location:cerrar_sesion.php");
}
else
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Página Principal</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrapguayuco.css">
		<link rel="stylesheet" type="text/css" href="guayucostyles.css">
	</head>
	<body>
		<div class="loginbox">
			<a class="btn btn-outline-danger btn-block" data-toggle="tooltip" data-placement="top" title="Cerrar la sesión"  href="cerrar_sesion.php">Cerrar Sesión</a>
		</div>
	</body>
	</html>
	<?php
}
?>