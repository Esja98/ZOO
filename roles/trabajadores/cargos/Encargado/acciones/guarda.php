<?php

require_once("conexion.php");
$nombre_e=mysql_escape_string($_POST[nombre_e]);
$nombre_sbe=mysql_escape_string($_POST[nombre_sbe]);
$id_animal=mysql_escape_string($_POST[id_animal]);
$zona_g=mysql_escape_string($_POST[zona_g]);
$alimentacion=mysql_escape_string($_POST[alimentacion]);
$habitat=mysql_escape_string($_POST[habitat]);
$descripcion=mysql_escape_string($_POST[descripcion]);


$query="INSERT INTO animales(nombre_a,nombre_e,nombre_sbe,nombre_zg,nombre_zn,des_a,nombre_h) VALUES ('$id_animal','$nombre_e','$nombre_sbe','$zona_g','$alimentacion','$descripcion','$habitat')"; 
              
$resultado=$conexion->query($query);
if ($resultado) {
	header("location:../mostrar_animal.php");
}else{echo "no se pudo guardar el animal";}


?>