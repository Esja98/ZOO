<?php
$id_t=$_REQUEST['id_t'];
include("conexion.php");

$query="DELETE FROM trabajador where id_t='$id_t'";
$resultado=$conexion->query($query);



if ($resultado) {
	header("location:../mostrar_trabajador.php");
}else{echo "no se pudo eliminar el trabajador";}
?>
