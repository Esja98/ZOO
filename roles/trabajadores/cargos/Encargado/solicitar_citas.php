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


include("acciones/conexion.php");
$qy="select * from animales";
$rs=$conexion->query($qy);


include("acciones/conexion.php");
$qytr="select * from trabajador where cargo_t='Veterinario'";
$rstr=$conexion->query($qytr);


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

			<form action="acciones/guarda_cita.php" method="POST">

						<div class="form-group">
						<label for="nombre"><center><h2>Solicitar Citas</h2></center></label>
						</p>
						<br>
							<label class="letraform" for="Nombre">Nombre del Animal:</label>
							<br/><br/>
							<select class="form-control" name="nombre_a" id="option">

								<?php 
									while($rw=$rs->fetch_assoc()){	
								?>
								<option value="<?php echo $rw['nombre_a']; ?>"><?php echo $rw['nombre_a'];?></option>
								<?php 
									}
								?>

 							</select>
							<br/><br/>
							</div>
							<label class="letraform" for="ID">Id del trabajador:</label>
							<br/><br/>
							<select class="form-control" name="id_t" id="option">

								<?php 
									while($rwtr=$rstr->fetch_assoc()){	
								?>
								<option value="<?php echo $rwtr['nombre_t']; ?>"><?php echo $rwtr['nombre_t'];?></option>
								<?php 
									}
								?>

 							</select>
							<br/><br/>

							<label class="letraform" for="Fecha">Fecha:</label>
							<br/><br/>
							<input class="form-control" name="fecha" type="date" placeholder="Fecha">
							<br/><br/>

							<label class="letraform" for="Hora">Hora:</label>
							<br/><br/>
							<input class="form-control" name="hora" type="time" placeholder="Hora">
							<br/><br/>

							<label class="letraform" for="emergencia">Emergencia:</label>
							<br/><br/>
                            <select class="form-control" name="emergencia" id="option">
							 	<option value="">no</option>
								<option value="">si</option>
							
							</select>
							
							 
							<p>
							<br/><br/>
							<center>
						    <input type="submit" value="Guardar" class="guardar">
						    <input type="reset" value="Borrar" class="Borrar">
						    </center>
						  	</p><br/><br/>
				
			</form>
						<center>
                		<a href="panel-control.php"><div class="boton" >volver</div></a>
                		</center>
			</div>
			</div>
		</main>



	
			
	</body>
</html>