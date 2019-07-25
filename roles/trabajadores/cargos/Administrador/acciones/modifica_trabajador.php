<?php
$id_t=$_REQUEST[id_t];
include("conexion.php");
$password=mysql_escape_string($_POST[password]);
$nombre_t=mysql_escape_string($_POST[nombre_t]);
$cargo_t=mysql_escape_string($_POST[cargo_t]);
$zona_g=mysql_escape_string($_POST[zona_g]);



$query="UPDATE trabajador SET 
password='$password',
nombre_t='$nombre_t',
cargo_t='$cargo_t',
zona_g='$zona_g' WHERE id_t='$id_t'";


$resultado=$conexion->query($query);


if ($resultado) {
	header("location:../mostrar_trabajador.php");
}else{echo "no se pudo modificar el trabajador";}

?>