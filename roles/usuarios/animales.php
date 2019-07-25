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


<?php
include("acciones/conexion.php");

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
$query="select *from especies";
$resultado=$conexion->query($query);
while($row=$resultado->fetch_assoc()){
?>

		<main>
			
			<div class="contenedoranimales">
					<div class="alinaImag">
						<center><h2></h2></center>
						<article>

							<img src="<?php echo $row['ruta_img']; ?>">
						
 	 
						</article>
						</div>

			
					<div class="alinaTexto">
					    <center><h2><?php echo $row['nombre_e']; ?></h2></center>
						<article>
							<h3><?php echo $row['des_e']; ?></h3>

						</article>
						</div>
					<div style="clear: both;"></div>	
			</div>
		</main>
		
<?php
}
?>

			<div style="clear: both;"></div>
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