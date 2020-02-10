<?php
session_start();
include("funciones/sesionInactiva.php");
include("funciones/verFacturaDetallado.php");
sesionInactiva();

//Validacion de la compra
if (isset($_REQUEST["exito"])) {
	echo "<script>alert('Su compra se ha realizado con exito')</script>";
}//Validacion de la compra
if (isset($_REQUEST["id_factura"]) && $_REQUEST["id_factura"] !== "") {
?>
<!DOCTYPE html>
<html>
<head>

	<title>Factura Detallada</title>
	<meta charset="utf-8">

	<!-- Importacion librerias de bootstrap , css y javascrip -->
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/SmoothScroll.min.js"></script>
	<!-- Importacion librerias de bootstrap , css y javascrip -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
		<div class="facturabox">
			<p class="title">Detalle de la factura: <span class="usertext">
				<?php echo $_REQUEST["id_factura"]; ?>
			</span>
			</p>
			<?php
			verFacturaDetallado($_REQUEST["id_factura"]);
			?>
		</div>
	</center>
</body>
</html>
<?php
} else {
	header("Location:mainpage.php");
}
?>