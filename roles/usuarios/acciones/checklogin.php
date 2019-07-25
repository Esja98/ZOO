<?php
session_start();
?>

<?php

include("conexion.php");

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$correo_uc = $_REQUEST['correo'];
$password = $_REQUEST['password'];
 
$sql = "SELECT * FROM usuarios_c WHERE correo_uc = '$correo_uc'";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {     }
	
 
  $row = $result->fetch_array(MYSQLI_ASSOC);
 // if (password_verify($password, $row['password'])) { 
if ($password==$row['password_uc']) { 

 
    $_SESSION['loggedin'] = true;
    $_SESSION['correo_uc'] = $correo_uc;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (50 * 60);

    echo "Bienvenido! " . $_SESSION['correo_uc'];
    echo "<br><br><a href=../panel-control.php>Panel de Control</a>"; 
    header('Location: ../panel-control.php');//redirecciona a la pagina del usuario

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='../../../'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 
 ?>