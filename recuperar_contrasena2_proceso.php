	<?php
	session_start();
	if (isset($_SESSION["usuario"]) and $_SESSION["sesion_activa"] == True)
	{
		header("Location:mainpage.php");
} //SI HAY SESION
else
{
	if (!isset($_REQUEST["usuario_id"]) and !isset($_SESSION["cambiar_contrasena"]) and $_SESSION["cambiar_contrasena"] == FALSE)
	{
		header("Location:cerrar_sesion.php");
	}
	else
	{
		include("conexion.php");
		$usuario_id = $_REQUEST["usuario_id"];
		$contrasena = $_POST["contrasena"];
		$contrasena2 = $_POST["contrasena2"];
		$_SESSION["mensaje"] = "";
		$todo_bien = TRUE;
		$sql_prueba = "SELECT * FROM usuarios WHERE usuario_id = '$usuario_id'";
		$resultado_prueba = $conexion->query($sql_prueba);
		$row_prueba = $resultado_prueba->fetch_assoc();
		if ($contrasena == "" or $contrasena2 == "")
		{
			$_SESSION["mensaje"] .= "Debes llenar todos los campos. ";
				mysqli_close($conexion);
				header("Location:recuperar_contrasena2.php?usuario_id=$usuario_id&error2=1");
		}
		else
		{	
			if (strlen($contrasena) < 2 or strlen($contrasena2) < 2)
			{
				$_SESSION["mensaje"] .= "Las contraseñas no pueden tener menos de 2 caracteres. ";
				$todo_bien = FALSE;
			}
			if (strlen($contrasena) > 20 or strlen($contrasena2) > 20)
			{
				$_SESSION["mensaje"] .= "Las contraseñas no pueden tener más de 20 caracteres.";
				$todo_bien = FALSE;
			}
			if ($contrasena !== $contrasena2)
			{
				$_SESSION["mensaje"] .= "Las contraseñas no coinciden. ";
				$todo_bien = FALSE;
			}
			if ($contrasena == $row_prueba["contrasena"] or $contrasena2 == $row_prueba["contrasena"])
			{
				$_SESSION["mensaje"] .= "Las contraseña ya existe. ";
				$todo_bien = FALSE;
			}
			if ($todo_bien == FALSE)
			{
				mysqli_close($conexion);
				header("Location:recuperar_contrasena2.php?usuario_id=$usuario_id&error2=1");
			} //SI NADA ESTA BIEN
			else
			{
				$sql = "UPDATE usuarios SET contrasena = '$contrasena' WHERE usuario_id = '$usuario_id'";
					$resultado = $conexion->query($sql);
					if ($resultado)
					{
						mysqli_close($conexion);
						$_SESSION["recuperar_exito"] = "La contraseña se ha actualizado con éxito";
						unset($_SESSION["recuperar_contrasena"]);
						header("Location:login.php?exito=1");
					} // SI HAY RESULTADOS
					else
					{
						mysqli_close($conexion);
						$_SESSION["mensaje"] .= "Ha sucedido un error inesperado. Por favor, vuelva a intentarlo";
						unset($_SESSION["recuperar_contrasena"]);
						header("Location:recuperar_contrasena.php?&error=1");
					} //SI NO HAY RESULTADOS
			} //SI TODO VA BIEN
		}
	}
} //SI NO HAY SESION ACTIVA
?>