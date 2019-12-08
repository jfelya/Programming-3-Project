<?php
session_start();
if (!isset($_SESSION["usuario"]) or $_SESSION["sesion_activa"] == False or $_SESSION["nivel"] !== "admin")
{
	header("Location:cerrar_sesion.php");
}
else
{
	if (isset($_POST["boton_modificar"]) and $_REQUEST["modificar"] = "1" and isset($_REQUEST["usuario_id"]))
	{

		include("conexion.php");
		$usuario_id = $_REQUEST["usuario_id"];
		$usuario = $_POST["usuario"];
		$correo = $_POST["correo"];
		$contrasena = $_POST["contrasena"];
		$contrasena2 = $_POST["contrasena2"];
		$nivel = strtolower($_POST["nivel"]);
		$pregunta_secreta = $_POST["pregunta_secreta"];
		$respuesta_secreta = strtolower($_POST["respuesta_secreta"]);
		$_SESSION["admin_error"] = "";
		$todo_bien = TRUE;

		echo "usuario_id";

		if ($usuario == ""
			or $correo == ""
			or $contrasena == ""
			or $contrasena2 == ""
			or $nivel == ""
			or $pregunta_secreta == ""
			or $respuesta_secreta == "")
		{
			$_SESSION["admin_error"] .= "Los campos no pueden estar vacíos. ";
			header("Location:admin.php?modificar_usuario=1&usuario_id=$usuario_id&admin_error=1");
		} // SI LOS CAMPOS ESTAN VACÍOS
		else
		{

			// COMPROBACIÓN DE MÁXIMO DE CARACTERES
			if (strlen($usuario) > 20
				or strlen($correo) > 20
				or strlen($contrasena) > 20
				or strlen($contrasena2) > 20
				or strlen($nivel) > 20
				or strlen($pregunta_secreta) > 20
				or strlen($respuesta_secreta) > 20)
			{
				$_SESSION["admin_error"] .= "Los campos no pueden tener más de 20 caractéres. ";
				$todo_bien = FALSE;
			}
				// COMPROBACIÓN DE MÁXIMO DE CARACTERES
				// COMPROBACIÓN DE MÍNIMO DE CARACTERES
			if (strlen($usuario) < 2
				or strlen($correo) < 2
				or strlen($contrasena) < 2
				or strlen($contrasena2) < 2
				or strlen($nivel) < 2
				or strlen($pregunta_secreta) <  2
				or strlen($respuesta_secreta) < 2)
			{
				$_SESSION["admin_error"] .= "Los campos no pueden tener menos de 2 caractéres. ";
				$todo_bien = FALSE;
			}
				// COMPROBACIÓN DE MÍNIMO DE CARACTERES
				// COMPROBACIÓN CORREO
			if (filter_var($correo, FILTER_VALIDATE_EMAIL) == FALSE)
			{
				$_SESSION["admin_error"] .= "El formato de correo es inválido. ";
				$todo_bien = FALSE;
			}
				// COMPROBACIÓN CORREO
				// COMPROBACIÓN DE CONTRASEÑA
			if ($contrasena !== $contrasena2)
			{
				$_SESSION["admin_error"] .= "Las contraseñas no coinciden. ";
				$todo_bien = FALSE;
			}
				// COMPROBACIÓN DE CONTRASEÑA
				//COMPROBACIÓN PRINCIPAL

			if ($todo_bien == FALSE)
			{
				header("Location:admin.php?modificar_usuario=1&usuario_id=$usuario_id&admin_error=1");
				} //SI HAY ERRORES
				else
				{
					$sql = "UPDATE usuarios SET usuario = '$usuario', correo = '$correo', contrasena = '$contrasena', nivel = '$nivel', pregunta_secreta = '$pregunta_secreta', respuesta_secreta = '$respuesta_secreta' WHERE usuario_id = '$usuario_id'";
					$resultado = $conexion->query($sql);
					if ($resultado)
					{
						mysqli_close($conexion);
						$_SESSION["admin_exito"] = "El usuario ha sido modificado con éxito";
						header("Location:admin.php?admin_exito=1");
					} // SI HAY RESULTADOS
					else
					{
						mysqli_close($conexion);
						$_SESSION["admin_error"] .= "Ha sucedido un error inesperado. Por favor, vuelva a intentarlo";
						header("Location:admin.php?modificar_usuario=1&usuario_id=$usuario_id&admin_error=1");
					} //SI NO HAY RESULTADOS
				} //SI NO HAY ERRORES
				//COMPROBACIÓN PRINCIPAL
			} // SI LOS CAMPOS NO ESTAN VACÍOS
	} // Si es para modificar
	else
	{
		include("conexion.php");
		$usuario = $_POST["usuario"];
		$correo = $_POST["correo"];
		$contrasena = $_POST["contrasena"];
		$contrasena2 = $_POST["contrasena2"];
		$nivel = strtolower($_POST["nivel"]);
		$pregunta_secreta = $_POST["pregunta_secreta"];
		$respuesta_secreta = strtolower($_POST["respuesta_secreta"]);
		$_SESSION["admin_error"] = "";
		$todo_bien = TRUE;
		$sql_prueba = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
		$resultado_prueba = $conexion->query($sql_prueba);
		$row_prueba = $resultado_prueba->fetch_assoc();
		if ($row_prueba["usuario"])
		{
			$_SESSION["admin_error"] .= "El usuario ya existe. ";
			header("Location:admin.php?admin_error=1");
		} // SI EL USUARIO EXISTE
		else
		{
			if ($usuario == ""
				or $correo == ""
				or $contrasena == ""
				or $contrasena2 == ""
				or $nivel == ""
				or $pregunta_secreta == ""
				or $respuesta_secreta == "")
			{
				$_SESSION["admin_error"] .= "Los campos no pueden estar vacíos. ";
				header("Location:admin.php?admin_error=1");
			} // SI LOS CAMPOS ESTAN VACÍOS
			else
			{
				// COMPROBACIÓN DE MÁXIMO DE CARACTERES
				if (strlen($usuario) > 20
					or strlen($correo) > 20
					or strlen($contrasena) > 20
					or strlen($contrasena2) > 20
					or strlen($nivel) > 20
					or strlen($pregunta_secreta) > 20
					or strlen($respuesta_secreta) > 20)
				{
					$_SESSION["admin_error"] .= "Los campos no pueden tener más de 20 caractéres. ";
					$todo_bien = FALSE;
				}
				// COMPROBACIÓN DE MÁXIMO DE CARACTERES
				// COMPROBACIÓN DE MÍNIMO DE CARACTERES
				if (strlen($usuario) < 2
					or strlen($correo) < 2
					or strlen($contrasena) < 2
					or strlen($contrasena2) < 2
					or strlen($nivel) < 2
					or strlen($pregunta_secreta) <  2
					or strlen($respuesta_secreta) < 2)
				{
					$_SESSION["admin_error"] .= "Los campos no pueden tener menos de 2 caractéres. ";
					$todo_bien = FALSE;
				}
				// COMPROBACIÓN DE MÍNIMO DE CARACTERES
				// COMPROBACIÓN CORREO
				if (filter_var($correo, FILTER_VALIDATE_EMAIL) == FALSE)
				{
					$_SESSION["admin_error"] .= "El formato de correo es inválido. ";
					$todo_bien = FALSE;
				}
				// COMPROBACIÓN CORREO
				// COMPROBACIÓN DE CONTRASEÑA
				if ($contrasena !== $contrasena2)
				{
					$_SESSION["admin_error"] .= "Las contraseñas no coinciden. ";
					$todo_bien = FALSE;
				}
				// COMPROBACIÓN DE CONTRASEÑA
				//COMPROBACIÓN PRINCIPAL
				if ($todo_bien == FALSE)
				{
					header("Location:admin.php?admin_error=1");
				} //SI HAY ERRORES
				else
				{
					$sql = "INSERT INTO `usuarios` (`usuario`, `correo`, `contrasena`, `nivel`, `pregunta_secreta`, `respuesta_secreta`) VALUES ('$usuario', '$correo', '$contrasena', '$nivel', '$pregunta_secreta', '$respuesta_secreta')";
					$resultado = $conexion->query($sql);
					if ($resultado)
					{
						mysqli_close($conexion);
						$_SESSION["admin_exito"] = "El usuario ha sido registrado con éxito";
						header("Location:admin.php?admin_exito=1");
					} // SI HAY RESULTADOS
					else
					{
						mysqli_close($conexion);
						$_SESSION["admin_error"] .= "Ha sucedido un error inesperado. Por favor, vuelva a intentarlo";
						header("Location:admin.php?admin_error=1");
					} //SI NO HAY RESULTADOS
				} //SI NO HAY ERRORES
				//COMPROBACIÓN PRINCIPAL
			} // SI LOS CAMPOS NO ESTAN VACÍOS
		} // SI EL USUARIO NO EXISTE
	} // SI EL BOTÓN ESTÁ PRESIONADO
} // SI ES ADMIN
?>