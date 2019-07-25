<?php
$nombre_zn=$_REQUEST[nombre_zn];
include("conexion.php");
$des_zn=mysql_escape_string($_POST[des_zn]);


$query="UPDATE zona_n SET 
des_zn='$des_zn' WHERE nombre_zn='$nombre_zn'";


$resultado=$conexion->query($query);


if ($resultado) {
	header("location:../mostrar_zonan.php");
}else{echo "no se pudo modificar el trabajador";}

?>