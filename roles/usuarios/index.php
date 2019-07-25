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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../../js/script.js"></script>
</head>
	
	<body>
		<div class="cabecera">
				<div class="imagencabecera">		
 	 				<img src="img/logo.png"/>
 	 
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
			
			<section id="banner">
					<img src="../../img/cinco.jpg">
				<div class="contenedor">
					<h2> Zoologico Sálvame</h2>
					<h3>Cuidar las especies en peligro de extinción</h3>
					<h3>es nuestra prioridad.</h3>
				</div>
			</section>


			<section id="Bienvenidos">
			<h2><center>BIENVENIDOS AL ZOOLOGICO</center></h2>
			</br>
			<p>Bienvenidos a la página oficial de nuestro zoológico sálvame, aquí encontrarás toda la información de nuestras instalaciones y de los animales que actualmente tenemos en excibición, tambien encontrarás información sobre nuestros planes y servicios que tenemos disponibles. Ven y disfruta de un dia lleno de esparcimiento y aprendizajes con tu familia. Zoológico Salváme la mejor opción para usted y sus seres queridos. En el zoológico salváme nos preocupamos y cuidamos a todas especies en vía de extición y sabemos lo importantes que son para nuestro planeta.</p>
			</section>

			<section id="blog">
				<h3>Conoce mas sobre nuestros horarios y tarifas</h3>
				<div class="contenedor">
					<article>
						<img src="../../img/boletas.png"  >
					</article>
					<article>
						<img src="../../img/salvame.png"  >
					</article>
				</div>
			</section>

			<section id="info">
					<h3>Conoce a nuestras hermosas especies</h3>
				<div class="contenedor">
					<div class="info-animal">
						<img src="../../img/leopa.png">
						<h4>panda</h4>
					</div>
					<div class="info-animal">
						<img src="../../img/jaguar.jpg">
						<h4>panda</h4>
					</div>

				</div>
			</section>

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