<?php
function verFacturas() {
	include("conexion.php");
	$usuario = $_SESSION["usuario"];
	$sql5 = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
	$resultado5 = $conexion->query($sql5);
	$row5 = $resultado5->fetch_assoc();
	$id_cliente = $row5["id_cliente"];
	$sql = "SELECT * FROM factura WHERE id_cliente = '$id_cliente'";
	$resultado = $conexion->query($sql);
	$row = $resultado->fetch_assoc();
	if (!$row) {
		?>
		<p>Actualmente no tienes ninguna factura a tu nombre</p><br>
		<a class="btn btn-outline-secondary"  href="mainpage.php">Regresar</a>
		<a class="btn btn-outline-danger" href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
		<?php
	} else {
		?>
		<center>
			<table class="table table-dark table-hover" >
				<tbody>
					<tr>
						<th class="tabletitle">
							Id
						</th>
						<th class="tabletitle">
							Fecha
						</th>
						<th class="tabletitle">
							Precio Total
						</th>
					</tr>
					<?php
					include("conexion.php");
					$query = "SELECT * FROM factura";
					$resultado = $conexion->query($query);

					$usuario = $_SESSION["usuario"];
					$sql5 = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
					$resultado5 = $conexion->query($sql5);
					$row5 = $resultado5->fetch_assoc();
					$id_cliente = $row5["id_cliente"];
					while ($row = $resultado->fetch_assoc())
					{
						if ($row["id_cliente"] == $id_cliente) {
							?>
							<tr>
								<td>
									<a href="ver_facturas_detallado.php?id_factura=<?php echo $row['id_factura']; ?>"><?php echo $row['id_factura']; ?></a>
								</td>
								<td>
									<?php echo $row['fecha']; ?>
								</td>
								<td>
									<?php echo $row['preciototal']; ?>  <span style="color:#54678F;">bsS</span>
								</td>
							</tr>
							<?php
						}
					}
					?>
				</tbody>
			</table><br>
		</center>
		<a class="btn btn-outline-secondary"  href="mainpage.php">Regresar</a>
		<a class="btn btn-outline-danger" href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
		<?php
	}
}
?>