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
					



               		<center><h1>Ingresar Datos Vehiculos</h1></center>
						</br></br></br> 
						 </article>
						<form action="acciones/guarda_vehiculos.php" method="POST">
						
							<label class="letraform" for="Dueño">Dueño:</label>
							<input class="form-control"  name="dueno" type="text" placeholder="Nombre">
							<br/><br/>

							<label class="letraform" for="Placa">Placa:</label>
							<input class="form-control"  name="placa" type="text" placeholder="Placa">
							<br/><br/>

							<label class="letraform" for="option">Tipo</label>
							<select class="form-control" name="tipo" id="option">
								<option value="Moto">Moto</option>
								<option value="Carro">Carro</option>
								<option value="Bus">Bus</option>
 							</select>
 							<br/><br/>

							<labelclass="letraform"  for="Marca">Marca</label>
							<input class="form-control"  name="marca" type="text" placeholder="Marca">
							<br/><br/>


							<label class="letraform" for="option">zona</label>
							<select class="form-control" name="id_zona" id="option">

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
							<input class="form-control" name="id_campo" type="text" placeholder="Puesto">
							<br/><br/>


						  	<div class="usuariobotones">
							
							<center>
						    <input type="submit" value="Guardar" class="boton">
						    <input type="reset" value="Borrar" class="boton">
						    </center>
                                 </div>                                                 
					
</form>
						<center>
                        <a href="panel-control.php"><div class="boton" >volver</div></a>
                        </center>
	
		</main>
			
	</body>
</html>
