<?php
function verCarrito() {
	foreach ($_SESSION["carrito"] as $posicion => $posicionvalor) {
		foreach ($posicionvalor as $campo => $campovalor) {
			if ($campo == "nombre") {
				echo "Nombre: ".$campovalor."<br>";
			} elseif ($campo == "precio") {
				echo "Precio: <span style='color:#54678F;'>".$campovalor." bsS</span><br>";
			} elseif ($campo == "cantidad") {
				echo "Cantidad: ".$campovalor."<br>";
			}
		}
		?>
		<a href="procesos/carrito.php?posicion=<?php echo $posicion; ?>&menosuno "class="btn btn-outline-info">-1</a><br><br>
		<?php
	}
}
?>