<?php
$placa=$_REQUEST['placa'];
include("conexion.php");

$query="DELETE FROM vehiculos where placa='$placa'";
$resultado=$conexion->query($query);



if ($resultado) {
	header("location:../mostrar_vehiculos.php");
}else{echo "no se pudo eliminar el vehiculo";}
?>
