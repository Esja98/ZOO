<?php
include("conexion.php");
$nombre_a=$_POST[nombre_a];
$id_t=$_POST[id_t];
$fecha=$_POST[fecha];
$emergencia=$_POST[emergencia];

if ($emergencia=='si') {

$sql2="UPDATE citas set fecha=ADDDATE(fecha, INTERVAL 1 DAY)";
$result2 = $conexion->query($sql2);


}

$query="INSERT INTO citas(nombre_a,id_t,fecha,hora,emergencia,reporte,estado) VALUES(
'$nombre_a','$id_t','$fecha','$hora','$emergencia','$nombre_a','pendiente')";

$resultado=$conexion->query($query);


if ($resultado) {
	header("location:panel-control.php");
}else{echo "no se pudo guardar datos";}

?>