<?php
include("conexion.php");
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

$nombre_c=$_GET[nombre_c];
$cantidad_p=$_GET[cantidad_p];
$cantidad_n=$_GET[cantidad_n];
$zonas=$_GET[zonas];
$zona1=$_GET[zona1];
$zona2=$_GET[zona2];
$zona3=$_GET[zona3];
$adicional=$_GET[adicional];
$metodo_pago=$_GET[metodo_pago];
$adicional_p=$_GET[adicional_p];
$total=0;



if ($zonas==1) {$total=30000;}elseif ($zonas==2) {$total=50000;$zona2=', '.$zona2;}elseif ($zonas==3) {$total=75000;	$zona2=', '.$zona2;$zona3=', '.$zona3;}
$zonaf=$zona1.$zona2.$zona3;
if ($adicional>0) {	$total=$total+(10000*$adicional);}
if ($cantidad_n>0) {$total_n=($total*0.5)*$cantidad_n;}
$total_p=($cantidad_p-$cantidad_n)*($total);
if ($cantidad_p>5) {$total=($total_p+$total_n)*0.8;}



$query="INSERT INTO compras(nombre_c,cantidad_p,cantidad_n,plan,zonas,adicional_z,metodop_c,admp_c,total) VALUES('$nombre_c','$cantidad_p','$cantidad_n','$zonas','$zonaf','$adicional','$metodo_pago','$adicional_p','$total')";

$resultado=$conexion->query($query);

if ($resultado) {
	header("location:../panel-control.php");
}else{
	echo "no se pudo efectuar la compra";}

?>