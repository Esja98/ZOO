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


$nombre_zn=$_REQUEST[nombre_zn];
include("acciones/conexion.php");
$des_zn=mysql_escape_string($_POST[des_zn]);


$query="select *from zona_n where nombre_zn='$nombre_zn'";
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

<form action="acciones/modifica_zonan.php?nombre_zn=<?php echo $rowc['nombre_zn']; ?>" method="POST">
					    
						<article>
						 <center><h1>Modificar la descripcion de zona natural</h1></center>
						</br></br></br> 
						 </article>

							<label class="letraform" for="Id">Id del trabajador:</label>
							<br/><br/>

							<input class="form-control" name="des_zn" type="numeric" placeholder="Id" value="<?php echo $rowc['des_zn']; ?>">
							<br/><br/>
							


							
							
						
					<div class="usuariobotones">
							
							<center>
						    <input type="submit" value="Guardar" class="boton">
						    <input type="reset" value="Borrar" class="boton">
						    </center>
						 </br></br>   
					</div>

                        <center>
                        <a href="mostrar_zonan.php"><div class="boton" >volver</div></a>
                        </center>
			</form>


			<?
}
?>
			</div>
			
</main>
			
	</body>
</html>