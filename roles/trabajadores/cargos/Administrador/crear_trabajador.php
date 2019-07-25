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
$qy="select * from zona_g";
$rs=$conexion->query($qy);

include("acciones/conexion.php");
$qyq="select * from cargos";
$rsq=$conexion->query($qyq);

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

			<form action="acciones/guarda_trabajador.php" method="POST">

						<div class="form-group">
						<label for="nombre"><center><h2>Registrar Trabajador</h2></center></label>
						</p>
						<br>
							<label class="letraform" for="Id">Id del trabajador:</label>
							<br/><br/>
							<input class="form-control" name="id_t" type="numeric" placeholder="Id">
							<br/><br/>
							</div>
							<label class="letraform" for="password">Password:</label>
							<br/><br/>
							<input class="form-control" name="password" type="text" placeholder="Password">
							<br/><br/>

							<label class="letraform" for="nombre">Nombre del trabajador:</label>
							<br/><br/>
							<input class="form-control" name="nombre_t" type="text" placeholder="Nombre del trabajador">
							<br/><br/>

							<label class="letraform" for="cargo">Cargo del trabajador:</label>
							<br/><br/>
							<select class="form-control" name="cargo_t" id="option">

								<?php 
									while($rwq=$rsq->fetch_assoc()){	
								?>
								<option value="<?php echo $rwq['cargo']; ?>"><?php echo $rwq['cargo']; ?></option>
								<?php 
									}
								?>

 							</select>
						
							<br/><br/>

							<label class="letraform" for="zona">Zona Geográfica asignada:</label>
							<br/><br/>
							<select class="form-control" name="zona_g" id="option">
								<?php while($rw=$rs->fetch_assoc()){	?>
								<option value="<?php echo $rw['nombre_zg']; ?>"><?php echo $rw['nombre_zg']; ?></option>
								<?php }	?>
 							</select>
 							</br> </br> 
						
							<br/><br/>

							
							</select> 
							<p>
							<br/><br/>
							<center>
						    <input type="submit" value="Guardar" class="guardar">
						    <input type="reset" value="Borrar" class="Borrar">
						    </center>
						  	</p>
				
			</form>
			</div>
			</div>
		</main>



	
			
	</body>
</html>