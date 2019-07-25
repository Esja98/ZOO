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


$placa=$_REQUEST[placa];
include("acciones/conexion.php");
$dueno=mysql_escape_string($_POST[dueno]);
$tipo=mysql_escape_string($_POST[tipo]);
$marca=mysql_escape_string($_POST[marca]);
$id_parqueadero=mysql_escape_string($_POST[id_parqueadero]);
$lugar=mysql_escape_string($_POST[lugar]);


$query="select *from vehiculos where placa='$placa'";
$resultado=$conexion->query($query);



while($row=$resultado->fetch_assoc()){

?><!DOCTYPE html>
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
					    <article>
						 <center><h1>Modificar los datos del vehiculo</h1></center>
						</br></br></br> 
						 </article>

		<form action="acciones/modifica_vehiculo.php?placa=<?php echo $row['placa']; ?>" method="POST">
				
					
							<label class="letraform" for="Dueño">Dueño:</label>
							<input class="form-control" name="dueno" type="text" placeholder="Nombre" value="<?php echo $row['dueno']; ?>">
							<br/><br/>

							<label class="letraform" for="Placa">Placa:</label>
							<input class="form-control" name="placa" type="text" placeholder="Placa" value="<?php echo $row['placa']; ?>">
							<br/><br/>

							<label class="letraform" for="option">Tipo</label>
							<select class="form-control" name="tipo" id="option" value="<?php echo $row['tipo']; ?>">
								<option value="Moto">Moto</option>
								<option value="Carro">Carro</option>
								<option value="Bus">Bus</option>
 							</select>
 							<br/><br/>

							<label class="letraform" for="Marca">Marca</label>
							<input class="form-control" name="marca" type="text" placeholder="Marca" value="<?php echo $row['marca']; ?>">
							<br/><br/>

							<label class="letraform" for="option">Zona</label>
							<select class="form-control" name="id_parqueadero" id="option" value="<?php echo $row['id_parqueadero']; ?>">

							
							<?php
							include("acciones/conexion.php");
							$query="select * from parqueadero";
							$resultado=$conexion->query($query);
							while($row3=$resultado->fetch_assoc()){
							?>
								<option value="<?php echo $row3['id']; ?>"><?php echo $row3['id']; ?></option>

							<?php
							}
							?>

 							</select>
 							<br/><br/>

							<label class="letraform" for="puesto">Puesto</label>
							<input class="form-control" name="campo" type="text" placeholder="Puesto" value="<?php echo $row['lugar']; ?>">
							<br/><br/>

							<div class="usuariobotones">
								<center>
								<p>
    								<input type="submit" value="Guardar" class="boton">
   									<input type="reset" value="Borrar" class="boton">
  								</p>  
  								</center>
							</div>

			</form>
						<center>
                		<a href="mostrar_vehiculos.php"><div class="boton" >volver</div></a>
                		</center>	

			</div>
			
		</main>
			
	</body>
</html>

							<?php
							}
							?>