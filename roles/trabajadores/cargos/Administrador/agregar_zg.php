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
		
		<main>
			<div class="crear_usuario">
					<div class="crear">

			<form action="acciones/guarda_zg.php" method="POST">

						<div class="form-group">
						<label for="nombre"><center><h2>Agregar Zona Geográfica</h2></center></label>
						</p>
						<br>
						<br/><br/>
							<label class="letraform" for="Nombre">Nombre Zona Geográfica:</label>
							<br/><br/>
							<input class="form-control" name="nombre_zg" type="text" placeholder="Nombre ">
							<br/><br/>
							</div>
							<label class="letraform" for="Descripción">Descripción Zona Geográfica:</label>
							<br/><br/>
							<input class="form-control" name="des_zg" type="text" placeholder="Descripción ">
							<br/><br/>

							<p>
							<br/><br/>
							<center>
						    <input type="submit" value="Guardar" class="guardar">
						    <input type="reset" value="Borrar" class="Borrar">
						    </center>
						  	</p>
						<center>
                		<a href="panel-control.php"><div class="boton" >volver</div></a>
                		</center>
				
			</form>
			</div>
			</div>
		</main>



	
			
	</body>
</html>