<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo "<br><a href='../../login_trabajador.html'>Login</a>";
   echo "<br><br><a href='crear_usuario.html'>Registrarme</a>";
   header('Location: ../../login_trabajador.html');


exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: login.html');
echo "Tu sesion a expirado,
<a href='../../login_trabajador.html'>Inicia Sesion</a>";
exit;
}


$id_animal=$_REQUEST[id_animal];
include("acciones/conexion.php");
$nombre_e=mysql_escape_string($_POST[nombre_e]);
$nombre_sbe=mysql_escape_string($_POST[nombre_sbe]);
$zona_g=mysql_escape_string($_POST[zona_g]);
$alimentacion=mysql_escape_string($_POST[alimentacion]);
$habitat=mysql_escape_string($_POST[habitat]);
$descripcion=mysql_escape_string($_POST[descripcion]);


$query="select *from animales where nombre_a='$id_animal'";
$resultado=$conexion->query($query);


include("acciones/conexion.php");
$qy="select * from zona_g";
$rs=$conexion->query($qy);

$qya="select * from habitad";
$rsa=$conexion->query($qya);

$qyaa="select * from zona_n";
$rsaa=$conexion->query($qyaa);

$qye="select * from especies";
$rse=$conexion->query($qye);

$qyse="select * from subespecie";
$rsse=$conexion->query($qyse);

while($rowc=$resultado->fetch_assoc()){

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
	<script src="../../../../js/script.js"></script>
</head>
	
	<body>
	


		<main  >
			
<div style="clear: both;"></div>
			
			<div class="contenedorusuario">

					<div class="usuarioicono">

<form action="acciones/modifica.php?id_animal=<?php echo $rowc['nombre_a']; ?>" method="POST">
					    
						<article>
						 <center><h1>Modificar los datos del Animal</h1></center>
						</br></br></br> 
						 </article>

							<label class="letraform" for="nombre">Id animal:</label>
							</br> 
							<input class="form-control" name="id_animal" type="text" placeholder="Id animal" value="<?php echo $rowc['nombre_a']; ?>">
							</br></br> 

						
							<label class="letraform" for="nombre">Nombre de Especie:</label>
							</br> 
							<select class="form-control" name="nombre_e" id="option" value="<?php echo $rowc['nombre_e']; ?>">

								<?php 
									while($rwe=$rse->fetch_assoc()){	
								?>
								<option value="<?php echo $rwe['nombre_e']; ?>"><?php echo $rwe['nombre_e']; ?></option>
								<?php 
									}
								?>

 							</select>
						
 							</br> </br> 


							<label class="letraform" for="nombre">Nombre subspecie:</label>
							</br> 
							<select class="form-control" name="nombre_sbe" id="option" value="<?php echo $rowc['nombre_sbe']; ?>">
								<?php while($rwse=$rsse->fetch_assoc()){	?>
								<option value="<?php echo $rwse['nombre_sbe']; ?>"><?php echo $rwse['nombre_sbe']; ?></option>
								<?php }	?>
 							</select>

 							</br> </br> 


						
							<label class="letraform" for="option">Zona Geografica:</label>

							</br> 
							<select class="form-control" name="zona_g" id="option" value="<?php echo $rowc['zona_g']; ?>">
								<?php while($rw=$rs->fetch_assoc()){	?>
								<option value="<?php echo $rw['nombre_zg']; ?>"><?php echo $rw['nombre_zg']; ?></option>
								<?php }	?>
 							</select>
 							</br> </br> 

					
							<label class="letraform" for="nombre">Alimentación:</label>
							</br> 
							<select class="form-control" name="alimentacion" id="option" value="<?php echo $rowc['alimentacion']; ?>">
								<?php while($rwaa=$rsaa->fetch_assoc()){	?>
								<option value="<?php echo $rwaa['nombre_zn']; ?>"><?php echo $rwaa['nombre_zn']; ?></option>
								<?php }	?>
 							</select>
							</br> </br> 
						
							<label  class="letraform" for="nombre">Habitat:</label>
							</br> 
							<select class="form-control" name="habitat" id="option"  value="<?php echo $rowc['habitat']; ?>">
								<?php while($rwa=$rsa->fetch_assoc()){	?>
								<option value="<?php echo $rwa['nombre_h']; ?>"><?php echo $rwa['nombre_h']; ?> - <?php echo $rwa['zona_g']; ?></option>
								<?php }	?>
 							</select>
							</br> </br> 
					
							<label class="letraform"  for="nombre">Descripción:</label>
							<input class="form-control" name="descripcion" type="text"  value="<?php echo $rowc['des_a']; ?>">

							
						</div>
				
					<div class="usuariobotones">
							
							<center>
						    <input type="submit" value="Guardar" class="boton">
						    <input type="reset" value="Borrar" class="boton">
						    </center>
						 </br></br>   
					</div>
			</form>


			<?
}
?>
			</div>
			
</main>
			
	</body>
</html>