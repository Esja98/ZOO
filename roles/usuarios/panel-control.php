<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo "<br><a href='login.html'>Login</a>";
   echo "<br><br><a href='crear_usuario.html'>Registrarme</a>";
   header('Location: login.html');


exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: login.html');
echo "Tu sesion a expirado,
<a href='login.html'>Inicia Sesion</a>";
exit;
}


?>


<!DOCTYPE html>
<html>
<head>
  <title>Zoologioco</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <link rel="stylesheet" type="text/css" href="../../css/fontello.css">
  <link rel="stylesheet" type="text/css" href="../../css/general.css">
  <link rel="stylesheet" type="text/css" href="../../css/banner.css">
  <link rel="stylesheet" type="text/css" href="../../css/planes.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../../js/script.js"></script>
</head>
  
  <body>
    <div class="cabecera">
        <div class="imagencabecera">    
          <img src="../../img/logo.png"/>
   
        </div>
        <div class="titulocabecera">
          <div class="titulo">SÁLVAME</div>
        </div>

    </div>
    
    <div style="clear: both;"></div>
    <div class="cabeceramenu">
    <div class="contenedormenu">
      <div class="contenedor">
        <input type="checkbox" id="menu-bar">
          <label class="icon-menu" for="menu-bar">Menú</label>
            <nav class="menu">
              <a class="icon-home" href="panel-control.php" >Inicio</a>
              <a class="icon-bird" href="animales.php" >Animales</a>
              <a class="icon-card" href="planes.php" >Planes</a>
              <a class="icon-globe" href="zonas_g" >Zonas Geográficas</a>
              <a class="icon-mail" href="contacto" >Contáctanos</a>
              <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                          echo "<a href=logout.php>Cerrar Sesion</a>";
                        } else {
                             echo "<a href='../../' >Ingresar</a>";
                             header('Location: ../../');
                        exit;}
              
                      ?>
            </nav>
      </div>
    </div>
    </div>

    <main  >
    
     <div class="contenedorcompras">

          <div class="iconocompras">
              <center><img src="../../img/icono.png"></center>
            <article>
             <center><h1>Bienvenid@ <?php echo $_SESSION['correo_uc'];?></h1></center>
             </article>
             </br>
            

          </div>


          <div class="usuariobotones">
              <article>
            <h3>Esta es su página de inicio, aquí encontrará sus compras realizadas.</h3>
            </br></br></br>


              <table role="table">
                <thead role="rowgroup">
                  <tr role="row">
                    <th role="columnheader">Nombre</th>
                    <th role="columnheader">Cantidad de personas</th>
                    <th role="columnheader">Cantidad de niños</th>
                    <th role="columnheader">Plan</th>
                    <th role="columnheader">Adicionales</th>
                    <th role="columnheader">Metodo de pago</th>
                    <th role="columnheader">Adicional Pago</th>
                    <th role="columnheader">Comprador</th>
                    <th role="columnheader">Total</th>
                    
                  </tr>
                </thead>

                <tbody role="rowgroup">
                      <?php
                        include("acciones/conexion.php");
                        $nombreco=$_SESSION['correo_uc'];
                        $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
                        $query="SELECT * FROM compras where nombre_c='$nombreco'";
                        $resultado=$conexion->query($query);
                        while($row=$resultado->fetch_assoc()){
                        ?>
                  <tr role="row">
                    <td role="cell"><?php echo $row['nombre_c']; ?></td>
                    <td role="cell"><?php echo $row['cantidad_p']; ?></td>
                    <td role="cell"><?php echo $row['cantidad_n']; ?></td>
                    <td role="cell"><?php echo $row['plan']; ?></td>
                    <td role="cell"><?php echo $row['zonas']; ?></td>
                    <td role="cell"><?php echo $row['adicional_z']; ?></td>
                    <td role="cell"><?php echo $row['metodop_c']; ?></td>
                    <td role="cell"><?php echo $row['admp_c']; ?></td>
                    <td role="cell"><?php echo $row['total']; ?></td>
                    
                  </tr>
                      <?php
                      }
                      ?>                 
                  
                </tbody>

              </table>



      <div style="clear: both;"></div>

              </br></br></br>
                           <center><h2>¿Desea Realizar otra compra?</h2></center>
             </br></br></br>
            </article>
              <center>
                <a href="planes.php"><div value="Ir a planes" class="boton" >Ir a planes</div></a>
                </center>
             </br></br>   
          </div>

      </div>

      <div style="clear: both;"></div>
  
      
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