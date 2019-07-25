<?php
$id_animal=$_REQUEST[id_animal];
include("conexion.php");
$nombre_e=mysql_escape_string($_POST[nombre_e]);
$nombre_sbe=mysql_escape_string($_POST[nombre_sbe]);
$zona_g=mysql_escape_string($_POST[zona_g]);
$alimentacion=mysql_escape_string($_POST[alimentacion]);
$habitat=mysql_escape_string($_POST[habitat]);
$descripcion=mysql_escape_string($_POST[descripcion]);



$query="UPDATE animales SET 
nombre_a='$id_animal',
nombre_e='$nombre_e',
nombre_sbe='$nombre_sbe',
nombre_zg='$zona_g',
nombre_zn='$alimentacion',
nombre_h='$habitat',
des_a='$descripcion' WHERE nombre_a='$id_animal'";


$resultado=$conexion->query($query);


if ($resultado) {
	header("location:../mostrar_animal.php");
}else{echo "no se pudo modificar el animal";}

?>