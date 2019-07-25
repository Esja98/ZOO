<?php

include("conexion.php");
 
 $form_pass = $_GET['password'];
 $form_name = $_GET['metodo_p'];
 $nombre = $_GET['username'];
 $form_num = $_GET['numero_pago'];
 $correo = $_GET['correo'];
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM usuarios
 WHERE correo = '$correo' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "correo ya asignado, ingresa otro." . "<br />";

 echo "<a href='index.html'>Por favor ingrese otro correo</a>";
 }
 else{

 $query = "INSERT INTO usuarios_c(nombre_uc, correo_uc, password_uc, metodop_uc,admp_uc) VALUES('$nombre','$correo','$form_pass','$form_name','$form_num')";



 if ($conexion->query($query) === TRUE) {
 // header('Location: http://localhost/Login/login.html');
 echo "<br />" . "<h1>" . "Gracias por registrarse!" . "</h1>";
 echo "<h3>" . "Bienvenido: " . $nombre . "</h3>" . "\n\n";
 echo "<h3>" . "Iniciar Sesion: " . "<a href='../login.html'>Login</a>" . "</h3>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>
