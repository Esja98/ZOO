
<?php
include("conexion.php");
$id_zona=$_POST[id_zona];
$placa=$_POST[placa];
$tipo=$_POST[tipo];
$dueno=$_POST[dueno];
$marca=$_POST[marca];
$id_campo=$_POST[id_campo];


$query="INSERT INTO vehiculos(id_parqueadero,placa,tipo,dueno,marca,lugar) VALUES('$id_zona','$placa','$tipo','$dueno','$marca',$id_campo')";


$resultado=$conexion->query($query);

if ($resultado) {
	header("location:../mostrar_parqueadero.php");
}else{echo "no se pudo guardar el parqueadero";}

?>