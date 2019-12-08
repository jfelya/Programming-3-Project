<!DOCTYPE html>
<html>
<head>
	<title>Eliminar Usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="felystyles.css">
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
		<center>
			<?php
			$usuario = $_REQUEST['usuario'];
			include("conexion.php");
			$query = "DELETE FROM usuarios WHERE usuario='$usuario'";
			$resultado = $conexion->query($query);

			if ($resultado) 
			{
				header("Location:lista_de_usuarios.php");
			}
			else
			{
				header("Location:lista_de_usuarios.php");
			}
			?>
		</center>
	</body>
	<?php
}
?>
</html>