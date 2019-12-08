<?php
session_start();
if (isset($_SESSION["usuario"]) and $_SESSION["sesion_activa"] == True)
{
	header("Location:mainpage.php");
} //SI HAY SESION
else
{
	if (isset($_REQUEST["con"]))
	{
		switch ($_REQUEST["con"])
		{
			case 'usuario':
			include("conexion.php");
			$usuario = $_POST["usuario"];
			$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
			$resultado = $conexion->query($sql);
			$row = $resultado->fetch_assoc();
			if (!$row["usuario"])
			{
				$_SESSION["mensaje"] = "El usuario no existe";
				mysqli_close($conexion);
				header("Location:recuperar_contrasena.php?recuperar=usuario&error=1");

			}
			else
			{
				$usuario_id = $row["usuario_id"];
				mysqli_close($conexion);
				header("Location:recuperar_contrasena.php?usuario_id=$usuario_id");
			}
			break;
			
			case 'correo':
			include("conexion.php");
			$correo = $_POST["correo"];
			$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
			$resultado = $conexion->query($sql);
			$row = $resultado->fetch_assoc();
			if (!$row["correo"])
			{
				$_SESSION["mensaje"] = "El correo no existe";
				mysqli_close($conexion);
				header("Location:recuperar_contrasena.php?recuperar=correo&error=1");
				
			}
			else
			{
				$usuario_id = $row["usuario_id"];
				mysqli_close($conexion);
				header("Location:recuperar_contrasena.php?usuario_id=$usuario_id");
			}
			break;

			case 'respuesta_secreta':
			include("conexion.php");
			$usuario_id = $_REQUEST["usuario_id"];
			$sql = "SELECT * FROM usuarios WHERE usuario_id = '$usuario_id'";
			$resultado = $conexion->query($sql);
			$row = $resultado->fetch_assoc();
			$respuesta_secreta = $_POST["respuesta_secreta"];
			if ($respuesta_secreta !== $row["respuesta_secreta"])
			{
				$_SESSION["mensaje"] = "El la respueta secreta es incorrecta";
				mysqli_close($conexion);
				header("Location:recuperar_contrasena.php?usuario_id=$usuario_id&error=1");
			}
			else
			{
				$_SESSION["cambiar_contrasena"] = TRUE;
				mysqli_close($conexion);
				header("Location:recuperar_contrasena2.php?usuario_id=$usuario_id");
			}
			break;
		}
	} // SI ESTÁ PUESTO "CON"
	else
	{
		header("Location:cerrar_sesion.php");
	}
}
?>