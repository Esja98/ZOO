<?php
session_start();
?>

<?php

include("conexion.php");

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$id_t = $_REQUEST['id_t'];
$password = $_REQUEST['password'];
 
$sql = "SELECT * FROM trabajador WHERE id_t = '$id_t'";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {     }
	
 
  $row = $result->fetch_array(MYSQLI_ASSOC);
 // if (password_verify($password, $row['password'])) { 
if ($password==$row['password']) { 

 
    $_SESSION['loggedin'] = true;
    $_SESSION['id_t'] = $id_t;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (50 * 60);

    echo "Bienvenido! " . $_SESSION['id_t'];


    
    $query="SELECT * FROM trabajador WHERE id_t = '$id_t'";
    $resultado=$conexion->query($query);
    while($row=$resultado->fetch_assoc()){

      if ($row['cargo_t']=='Encargado') {
      echo "<br><br><a href=../cargos/Encargado/panel-control.php>Panel de Control</a>"; 
      header('Location: ../cargos/Encargado/panel-control.php');//redirecciona a la pagina del Encargado
      }elseif ($row['cargo_t']=='Veterinario') {
      echo "<br><br><a href=../cargos/Veterinario/panel-control.php>Panel de Control</a>"; 
      header('Location: ../cargos/Veterinario/panel-control.php');//redirecciona a la pagina del Veterinario
      }elseif ($row['cargo_t']=='Parqueadero') {
      echo "<br><br><a href=../cargos/Parqueadero/panel-control.php>Panel de Control</a>"; 
      header('Location: ../cargos/Parqueadero/panel-control.php');//redirecciona a la pagina del Veterinario
      }elseif ($row['cargo_t']=='Administrador') {
      echo "<br><br><a href=../cargos/Parqueadero/panel-control.php>Panel de Control</a>"; 
      header('Location: ../cargos/Administrador/panel-control.php');//redirecciona a la pagina del Administrador
      }

    }

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='../../login_trabajador.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 
 ?>