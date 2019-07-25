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


$id=$_REQUEST[id];
include("acciones/conexion.php");
$zona_p=mysql_escape_string($_POST[zona_p]);
$lugares=mysql_escape_string($_POST[lugares]);


$query="select *from parqueadero where id='$id'";
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
	


		<main>
			

			<div style="clear: both;"></div>
			
			<div class="contenedorusuario">

					<div class="usuarioicono">


<form action="acciones/modifica_parqueadero.php?id=<?php echo $row['id']; ?>" method="POST">
				<article>
						 <center><h1>Modificar Parqueadero</h1></center>
						</br></br></br> 
						 </article>
					
					


							<label class="letraform"  for="zona">zona:</label>
							<br/><select class="form-control" name="zona_p" id="option" value="<?php echo $row['zona_p']; ?>">

							<?php
							$query2="select * from zona_p";
							$resultado2=$conexion->query($query2);
							while($row2=$resultado2->fetch_assoc()){
							?>
								<option value="<?php echo $row2['id_zona']; ?>"><?php echo $row2['id_zona']; ?></option>

							<?php
							}
							?>
                            </select>
							<br/><br/>

							<label class="letraform" for="lugares">lugares:</label>
							<input  class="form-control" name="lugares" type="text" placeholder="lugares" value="<?php echo $row['lugares']; ?>">
							<br/><br/>
							<center>
						    <input type="submit" value="Guardar" class="boton">
						    <input type="reset" value="Borrar" class="boton">
						    </center>
							<br/><br/>


			</form>
						<center>
                		<a href="mostrar_parqueadero.php"><div class="boton" >volver</div></a>
                		</center>			</div>
			</div>
			
		</main>
			
	</body>
</html>


<?php
}
?>