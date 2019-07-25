<?php
$nombre_zg=$_REQUEST['nombre_zg'];
include("conexion.php");

$query="DELETE FROM zona_g where nombre_zg='$nombre_zg'";
$resultado=$conexion->query($query);



if ($resultado) {
	header("location:../mostrar_zonag.php");
}else{echo "no se pudo eliminar el trabajador";}
?>
