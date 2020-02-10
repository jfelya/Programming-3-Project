<?php
function mostrarErrorExito() {
	// ERROR USUARIO
	if (isset($_SESSION["admin_error"]) and $_SESSION["admin_error"] !== "")
	{
		echo "<script>alert('".$_SESSION["admin_error"]."')</script>";
		unset($_SESSION["admin_error"]);
	} 
	//SI LOS ERRORES ESTÁN PUESTOS
	// ERROR USUARIO

	// EXITO USUARIO
	if (isset($_SESSION["admin_exito"]) and $_SESSION["admin_exito"] !== "")
	{
		echo "<script>alert('".$_SESSION["admin_exito"]."')</script>";
		unset($_SESSION["admin_exito"]);
	} 
	//SI EL EXITO ESTÁ PUESTO
	// EXITO USUARIO

	
	if (isset($_SESSION["producto_error"]) and isset($_REQUEST["producto_error"]))
	{
		if ($_SESSION["producto_error"] !== "" and isset($_REQUEST["producto_error"]))
		{
			echo "<script>alert('".$_SESSION["producto_error"]."')</script>";
			unset($_SESSION["producto_error"]);
		} 
	//SI HAY ERRORES
	} 
	//SI LOS ERRORES ESTÁN PUESTOS
	// ERROR PRODUCTO
	// EXITO PRODUCTO
	if (isset($_SESSION["producto_exito"]) and isset($_REQUEST["producto_exito"]))
	{
		if ($_SESSION["producto_exito"] !== "" and isset($_REQUEST["producto_exito"]))
		{
			echo "<script>alert('".$_SESSION["producto_exito"]."')</script>";
			unset($_SESSION["producto_exito"]);
		} 
	//SI ES EXITOSOS
	} 
	//SI EL EXITO ESTÁ PUESTO
	// EXITO PRODUCTO
}
?>