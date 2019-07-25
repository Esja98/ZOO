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


include("acciones/conexion.php");
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
$qy="select * from zona_g";
$rs=$conexion->query($qy);
$qy2="select * from zona_g";
$rs2=$conexion->query($qy2);

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


		<main>
			<div class="contenedorplanes">
					<div class="plan2datos">

			<form action="acciones/calcula_precio.php" method="GET">

						<div class="form-group">
						<label for="nombre"><center><h2>Registar Plan 1</h2></center></label>
						</p>
						<br><br>

							<div class="letraformulario"><label for="nombre_c">Nombre:</label></div>
							<input class="form-control" name="nombre_c" type="text"  value="<?php echo  $_SESSION['correo_uc'];?>">

						<br/><br/>


							<div class="letraformulario"><label class="letraform" for="cantidad_p">Cantidad de Personas:</label></div>
							<input class="form-control" name="cantidad_p" type="text" placeholder="Numero de personas">

						<br/><br/>

							<div class="letraformulario"><label for="cantidad_n">Cantidad de niños:</label></div>
							<input class="form-control" name="cantidad_n" type="text" placeholder="Cantidad de niños">

						<br/><br/>

							<div class="letraformulario"><label  for="zonas">Tipo de paquete:</label></div>
							<input class="form-control" name="zonas" type="text" placeholder="paquete" value="2">

						<br/><br/>

							<div class="letraformulario"><label  for="zona1">Zona 1:</label></div>
							<select class="form-control" name="zona1" id="option">
							<?php while($rw=$rs->fetch_assoc()){	?>
							<option value="<?php echo $rw['nombre_zg']; ?>"><?php echo $rw['nombre_zg']; ?></option>
							<?php }	?>
 							</select>

						<br/><br/>

							<div class="letraformulario"><label  for="zona2">Zona 2:</label></div>
							<select class="form-control" name="zona2" id="option">
							<?php while($rw2=$rs2->fetch_assoc()){	?>
							<option value="<?php echo $rw2['nombre_zg']; ?>"><?php echo $rw2['nombre_zg']; ?></option>
							<?php }	?>
 							</select>

						<br/><br/>

							<div class="letraformulario"><label  for="metodo_pago">Metodo de pago:</label></div>
							<input class="form-control" name="metodo_pago" type="text" placeholder="Metodo de pago">
						
						<br/><br/>

							<div class="letraformulario"><label  for="adicional_p">Adicional de personas:</label></div>
							<input  class="form-control" name="adicional_p" type="text" placeholder="Adicional">
							
						<br/><br/>

							<p>
							<center>
								<?php
			                  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			                    echo "<input type='submit' value='Comprar' class='guardar1'>";
						    	echo "<input type='reset' value='Borrar' class='Borrar1'>";
			                  } else {
			                       echo "Inicia Sesion para acceder a este contenido.<br>";
			                       echo "<a href='login.html' >Ingresar</a>";
			                       header('Location: login.html');
			                  exit;}
              
                			?>
						    
						    </center>
						  	</p>
				
			</form>
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