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
			
			
			
			<div class="contenedorusuario">
			<div class="usuarioicono">
					<article>
						 <center><h1>Crear Parqueadero</h1></center>
						</br></br></br> 
						 </article>
					
					<form action="acciones/guarda_parqueadero.php" method="POST" enctype="multipart/form-data">

						
							<label class="letraform"  for="Dueño">Id:</label>
							<br/>
							<input class="form-control" name="id_parqueadero" type="text" placeholder="id">
							<br/>

							<label class="letraform"  for="zona">Zona:</label>
							<br/><select class="form-control" name="zona" id="option">

							<?php
							include("acciones/conexion.php");
							$query="select * from zona_p";
							$resultado=$conexion->query($query);
							while($row=$resultado->fetch_assoc()){
							?>
								<option value="<?php echo $row['id_zona']; ?>"><?php echo $row['id_zona']; ?></option>

							<?php
							}
							?>
                            </select>
							<br/>

							<label class="letraform"  for="lugares">Lugares:</label>
							<br/>
							<input class="form-control" name="lugares" type="text" placeholder="Lugares">
							<br/>                                                            
							<div class="usuariobotones">
							<p><div class="usuariobotones">
							
							<center>
						    <input type="submit" value="Guardar" class="boton">
						    <input type="reset" value="Borrar" class="boton">
						    </center>
                                 </div>   
					</form>
						<center>
                		<a href="panel-control.php"><div class="boton" >volver</div></a>
                		</center>

			</div>	
			
		</main>
	</body>
</html>