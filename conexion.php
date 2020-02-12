<?php
$servidor = "localhost";
$usuario = "guayuco";
$contra = "digital";
$db = "guayuco_digital";

// Create connection
$conexion = new mysqli($servidor, $usuario, $contra, $db);

// Check connection
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}
?>