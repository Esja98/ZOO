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


$nombre_zg=$_REQUEST[nombre_zg];
include("acciones/conexion.php");
$des_zg=mysql_escape_string($_POST[des_zg]);

$query="select *from zona_g where nombre_zg='$nombre_zg'";
$resultado=$conexion->query($query);



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

<form action="acciones/modifica_zonag.php?nombre_zg=<?php echo $rowc['nombre_zg']; ?>" method="POST">
					    
						<article>
						 <center><h1>Modificar la descripcion de zona geografica</h1></center>
						</br></br></br> 
						 </article>

							<label class="letraform" for="Id">descripcion:</label>
							<br/><br/>

							<input class="form-control" name="nombre_zg" type="numeric" placeholder="Id" value="<?php echo $rowc['nombre_zg']; ?>">
							<br/><br/>
							

							
							
						
					<div class="usuariobotones">
							
							<center>
						    <input type="submit" value="Guardar" class="boton">
						    <input type="reset" value="Borrar" class="boton">
						    </center>
						 </br></br>   
					</div>

                        <center>
                        <a href="mostrar_zonag.php"><div class="boton" >volver</div></a>
                        </center>
			</form>


			<?
}
?>
			</div>
			
</main>
			
	</body>
</html>