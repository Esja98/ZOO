<?php
$id=$_REQUEST['id'];
include("conexion.php");

$query="DELETE FROM parqueadero where id='$id'";
$resultado=$conexion->query($query);



if ($resultado) {
	header("location:../mostrar_parqueadero.php");
}else{echo "no se pudo eliminar el vehiculo";}
?>
