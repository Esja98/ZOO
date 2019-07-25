<?php
session_start();

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: login_trabajador.html');
echo "Tu sesion a expirado,
<a href='login_trabajador.html'>Inicia Sesion</a>";
exit;
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Zoologioco</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <link rel="stylesheet" type="text/css" href="../../../../css/fontello.css">
  <link rel="stylesheet" type="text/css" href="../../../../css/general.css">
  <link rel="stylesheet" type="text/css" href="../../../../css/banner.css">
  <link rel="stylesheet" type="text/css" href="../../../../css/planes.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../../js/script.js"></script>
</head>
  


    <main  >
      
      <div class="contenedorusuario">

          <div class="iconocompras">
              <center><img src="../../../../img/icono.png"></center>
            <article>
                      <?php
                          include("../../acciones/conexion.php");
                          $nombretra=$_SESSION['id_t'];
                          $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
                          $query="SELECT * FROM trabajador WHERE id_t = '$nombretra'";
                          $resultado=$conexion->query($query);
                          while($row=$resultado->fetch_assoc()){
                          $usuariotemp=$row['nombre_t'];
                        }

                      ?>

             <center><h1>Bienvenido Señor(a) <?php echo $usuariotemp; ?></h1></center>
             
             </article>
            

          </div>

        
          <div class="usuariobotones">
              <article>
             <center><h2>¿Que desea hacer?</h2></center>
             </br></br></br>
            </article>
              <center>
                <a href="ingresar_vehiculos.php"><div class="boton">Ingresar vehiculos</div></a>
                <br/>
                <a href="mostrar_vehiculos.php"><div class="boton">Mostrar vehiculos</div></a>
                <br/>
                <a href="ingresar_parqueadero.php"><div class="boton">Crear Parqueadero</div></a>
                <br/>
                <a href="mostrar_parqueadero.php"><div class="boton">Mostrar Parqueadero</div></a>
                <br/>
                <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                          echo "<a href='logout.php'><div class='boton' >Cerrar Sesion</div></a>";
                        } else {
                             echo "<a href='../../../../login_trabajador.html' >Ingresar</a>";
                             header('Location: ../../../../login_trabajador.html');
                        exit;}
              
                ?>
                </center>
             </br></br>   
          </div>

      </div>
      
    </main>
    <footer>
      <div class="contenedor">
        <p id="copy">Zoo Sálvame &copy 2019</p>
        <div class="sociales">
          <a class="icon-facebook" href=""></a>
          <a class="icon-twitter" href=""></a>
          <a class="icon-instagram" href=""></a>
          
        </div>
      </div>
    </footer>
      
  </body>
</html>