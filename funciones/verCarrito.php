<?php
function verCarrito() {
	foreach ($_SESSION["carrito"] as $posicion => $posicionvalor) {
		echo "<tr>";
			?>
			<td>
				<?php
				echo $posicionvalor["nombre"];
				?>
			</td>
			<td>
				<?php
				echo $posicionvalor["precio"];
				?>
			</td>
			<td>
				<?php
				echo $posicionvalor["cantidad"];
				?>
			</td>							
			<?php
		echo "</tr>";
	}
}
?>