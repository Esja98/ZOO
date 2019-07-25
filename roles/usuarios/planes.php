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
			
			<section id="banner">
					<img src="../../img/cinco.jpg">
				<div class="contenedor">
					<h2> Zoologico Sálvame</h2>
					<h3>Cuidar las especies en peligro de extinción</h3>
					<h3>es nuestra prioridad.</h3>
				</div>
			</section>

			<div style="clear: both;"></div>
			
			<div class="contenedorplanes">
					<div class="plan1">
						<center><h2>Plan 1</h2></center><br/><br/>
						<article>
							<h4>Bienvenidos a Sálvame el mejor zoologico de la región y te ofrecemos los mejores planes y te garantizamos que te llevaras las mejores experiencias, en este plan es de 1 zona y puedes elegir las que mas desees solo por el valor de $30.000 mil pesos mas iva incluido, que esperas, animate.<br/><br/><br/></h4>
						</article>
						<br>
						<ul class="button">
    						<li><a class="download" href="plan1.php">Comprar</a></li>
 						</ul>
					</div>

			
					<div class="plan2">
					    <center><h2>Plan 2</h2></center><br/><br/>
						<article>
							<h4>Bienvenidos a Sálvame el mejor zoologico de la región y te ofrecemos los mejores planes y te garantizamos que te llevaras las mejores experiencias, en este plan es de 2 zonas y puedes elegir las que mas desees solo por el valor de $50.000 mil pesos mas iva incluido, que esperas, animate.
							<br/><br/><br/></h4>
						</article>
							<br>
						<ul class="button">
    						<li><a class="download" href="plan2.php">Comprar</a></li>
 						 </ul>

					</div>

				
					<div class="plan3">

						<center><h2>Plan 3</h2></center><br/><br/>
						<article>
							<h4>Bienvenidos a Sálvame el mejor zoologico de la región y te ofrecemos los mejores planes y te garantizamos que te llevaras las mejores experiencias, en este plan es de 3 zonas y puedes elegir las que mas desees solo por el valor de $75.000 mil pesos mas iva incluido, tambien puedes escoger zonas adicionales, que esperas, animate.</h4>
						</article>
							<br>
						<ul class="button">
   							 <li><a class="download" href="plan3.php">Comprar</a></li>
 						 </ul>
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