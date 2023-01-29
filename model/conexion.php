<?php 
$servidor= "localhost";
$usuario= "root";
$password = "";
$nombreBD= "CPRecarga";
$conexion = new mysqli(
			$servidor, 
			$usuario, 
			$password, 
			$nombreBD
			);
if ($conexion->connect_error) {
    die("la conexión ha fallado: " . $conexion->connect_error);
}

?>