<?php

require_once("conexion.php");
$id_t=mysql_escape_string($_POST[id_t]);
$password=mysql_escape_string($_POST[password]);
$nombre_t=mysql_escape_string($_POST[nombre_t]);
$cargo_t=mysql_escape_string($_POST[cargo_t]);
$zona_g=mysql_escape_string($_POST[zona_g]);


$query="INSERT INTO trabajador(id_t,password,nombre_t,cargo_t,zona_g) VALUES ('$id_t','$password','$nombre_t','$cargo_t','$zona_g')"; 
              
$resultado=$conexion->query($query);
if ($resultado) {
	header("location:../mostrar_trabajador.php");
}else{echo "no se pudo guardar el animal";}


?>