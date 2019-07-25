<?php
$id_animal=$_REQUEST['id_animal'];
include("conexion.php");

$query="DELETE FROM animales where nombre_a='$id_animal'";
$resultado=$conexion->query($query);



if ($resultado) {
	header("location:../mostrar_animal.php");
}else{echo "no se pudo eliminar el animal";}
?>
