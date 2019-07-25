<?php

require_once("conexion.php");
$nombre_zg=mysql_escape_string($_POST[nombre_zg]);
$des_zg=mysql_escape_string($_POST[des_zg]);


$query="INSERT INTO zona_g(nombre_zg,des_zg) VALUES ('$nombre_zg','$des_zg')"; 
              
$resultado=$conexion->query($query);
if ($resultado) {
	header("location:../mostrar_zonag.php");
}else{echo "no se pudo guardar el animal";}


?>