<?php
$id=$_REQUEST['id'];
include("conexion.php");
$zona_p=$_POST[zona_p];
$lugares=$_POST[lugares];



$query="UPDATE parqueadero SET 
zona_p='$zona_p',
lugares='$lugares' WHERE id='$id'";

$resultado=$conexion->query($query);


if ($resultado) {
	header("location:../mostrar_parqueadero.php");
}else{echo "no se pudo modificar el vehiculo";}

?>