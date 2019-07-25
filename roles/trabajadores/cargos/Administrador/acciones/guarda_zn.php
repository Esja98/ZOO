<?php

require_once("conexion.php");
$nombre_zn=mysql_escape_string($_POST[nombre_zn]);
$des_zn=mysql_escape_string($_POST[des_zn]);


$query="INSERT INTO zona_n(nombre_zn,des_zn) VALUES ('$nombre_zn','$des_zn')"; 
              
$resultado=$conexion->query($query);
if ($resultado) {
	header("location:../mostrar_zonan.php");
}else{echo "no se pudo guardar el animal";}


?>