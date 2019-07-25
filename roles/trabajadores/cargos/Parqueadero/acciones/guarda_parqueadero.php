<?php
include("conexion.php");
$id_parqueadero=$_POST[id_parqueadero];
$zona=$_POST[zona];
$lugares=$_POST[lugares];


$query="INSERT INTO parqueadero(id,zona_p,lugares) VALUES('$id_parqueadero','$zona','$lugares')";

$resultado=$conexion->query($query);

if ($resultado) {
	header("location:../mostrar_parqueadero.php");
}else{echo "no se pudo guardar el parqueadero";}

?>