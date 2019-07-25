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

			<form action="acciones/guarda_zn.php" method="POST">

						<div class="form-group">
						<label for="nombre"><center><h2>Agregar Zona Natural</h2></center></label>
						</p>
						<br>
							<br/><br/>
							<label class="letraform" for="Nombre">Nombre de Zona Natural:</label>
							<br/><br/>
							<input class="form-control" name="nombre_zg" type="text" placeholder="Nombre ">
							<br/><br/>
							</div>
							<label class="letraform" for="Descripción">Descripción de Zona Natural:</label>
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