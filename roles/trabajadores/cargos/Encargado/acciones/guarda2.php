<?php
include("conexion.php");
$nombre_e=$_GET[nombre_e];
$id_especie=$_GET[id_especie];
$id_animal=$_GET[id_animal];
$zona_g=$_GET[zona_g];
$alimentacion=$_GET[alimentacion];
$habitat=$_GET[habitat];
$descripcion=$_GET[descripcion];





$query="INSERT INTO animales(id_animal,nombre_e,id_especie,zona_g,alimentacion,habitat,descripcion) VALUES('$id_animal','$nombre_e','$id_especie','$zona_g','$alimentacion','$habitat','$descripcion')";

$resultado=$conexion->query($query);

if ($resultado) {
	header("location:../mostrar_animal.php");
}else{echo "no se pudo guardar el animal";}


?>


