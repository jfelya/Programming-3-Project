<?php
function sesionInactiva() {

	//VARIABLES LÓGICAS
	$haySesion = isset($_SESSION["usuario"]) 
	&& isset($_SESSION["sesion_activa"]);
	//VARIABLES LÓGICAS

	//SI NO HAY SESION
	if (!$haySesion) {
		header("Location:procesos/cerrar_sesion.php");
	}
	//SI NO HAY SESION
}
