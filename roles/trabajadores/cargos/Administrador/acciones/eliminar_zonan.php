<?php
$nombre_zn=$_REQUEST['nombre_zn'];
include("conexion.php");

$query="DELETE FROM zona_n where nombre_zn='$nombre_zn'";
$resultado=$conexion->query($query);



if ($resultado) {
	header("location:../mostrar_zonan.php");
}else{echo "no se pudo eliminar el trabajador";}
?>
