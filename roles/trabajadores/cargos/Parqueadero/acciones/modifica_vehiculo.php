<?php
$placa=$_REQUEST['placa'];
include("conexion.php");
$id_parqueadero=$_POST[id_parqueadero];
$tipo=$_POST[tipo];
$dueno=$_POST[dueno];
$marca=$_POST[marca];
$campo=$_POST[campo];




$query="UPDATE vehiculos SET 
id_parqueadero='$id_parqueadero',
placa='$placa',
tipo='$tipo',
dueno='$dueno',
marca='$marca',
lugar='$campo' WHERE placa='$placa'";

$resultado=$conexion->query($query);


if ($resultado) {
	header("location:../mostrar_vehiculos.php");
}else{echo "no se pudo modificar el vehiculo";}

?>