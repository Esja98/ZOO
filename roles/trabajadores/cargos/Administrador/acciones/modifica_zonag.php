<?php
$nombre_zg=$_REQUEST[nombre_zg];
include("conexion.php");
$des_zg=mysql_escape_string($_POST[des_zg]);



$query="UPDATE zona_g SET 
des_zg='$des_zg' WHERE nombre_zg='$nombre_zg'";


$resultado=$conexion->query($query);


if ($resultado) {
	header("location:../mostrar_zonag.php");
}else{echo "no se pudo modificar el trabajador";}

?>