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


$id_t=$_REQUEST[id_t];
include("acciones/conexion.php");
$password=mysql_escape_string($_POST[password]);
$nombre_t=mysql_escape_string($_POST[nombre_t]);
$cargo_t=mysql_escape_string($_POST[cargo_t]);
$zona_g=mysql_escape_string($_POST[zona_g]);


$query="select *from trabajador where id_t='$id_t'";
$resultado=$conexion->query($query);



include("acciones/conexion.php");
$qy="select * from zona_g";
$rs=$conexion->query($qy);

include("acciones/conexion.php");
$qyq="select * from cargos";
$rsq=$conexion->query($qyq);

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

<form action="acciones/modifica_trabajador.php?id_t=<?php echo $rowc['id_t']; ?>" method="POST">
					    
						<article>
						 <center><h1>Modificar los datos del Animal</h1></center>
						</br></br></br> 
						 </article>

							<label class="letraform" for="Id">Id del trabajador:</label>
							<br/><br/>

							<input class="form-control" name="id_t" type="numeric" placeholder="Id" value="<?php echo $rowc['id_t']; ?>">
							<br/><br/>
							

							<label class="letraform" for="password">Password:</label>
							<br/><br/>
							<input class="form-control" name="password" type="text" placeholder="Password"value="<?php echo $rowc['password']; ?>">
							<br/><br/>

							<label class="letraform" for="nombre">Nombre del trabajador:</label>
							<br/><br/>
							<input class="form-control" name="nombre_t" type="text" placeholder="Nombre del trabajador" value="<?php echo $rowc['nombre_t']; ?>">
							<br/><br/>

							<label class="letraform" for="cargo">Cargo del trabajador:</label>
							<br/><br/>
							<select class="form-control" name="cargo_t" id="option" value="<?php echo $rowc['cargo_t']; ?>">

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
							<select class="form-control" name="zona_g" id="option"value="<?php echo $rowc['zona_g']; ?>">
								<?php while($rw=$rs->fetch_assoc()){	?>
								<option value="<?php echo $rw['nombre_zg']; ?>"><?php echo $rw['nombre_zg'];?></option>
								<?php }	?>
 							</select>
 							</br> </br> 
						
							<br/><br/>

							
							
						
					<div class="usuariobotones">
							
							<center>
						    <input type="submit" value="Guardar" class="boton">
						    <input type="reset" value="Borrar" class="boton">
						    </center>
						 </br></br>   
					</div>

                        <center>
                        <a href="mostrar_trabajador.php"><div class="boton" >volver</div></a>
                        </center>
			</form>


			<?
}
?>
			</div>
			
</main>
			
	</body>
</html>