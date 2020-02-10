<?php
session_start();
include("funciones/sesionInactiva.php");
sesionInactiva();
include("funciones/verFacturas.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ver Facturas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/SmoothScroll.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
		<div class="facturabox">
			<p class="title">Facturas de: <span class="usertext">
				<?php echo $_SESSION["usuario"]; ?>
			</span>
			</p>
			<?php
			verFacturas();
			?>
		</div>
	</center>
</body>
</html>