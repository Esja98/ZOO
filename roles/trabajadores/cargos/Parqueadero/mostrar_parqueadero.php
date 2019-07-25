
<style type="text/css">
	
table{
	width:100%;
	max-width:100%;
	font-family:'Roboto',sans-serif;
  border-collapse: collapse;
}

table  td{
	border:0;
	color:#000; 
	padding: 10px 0;
	font-weight:400;
	background:#fff;
	line-height:17px;
	overflow:hidden;
	text-align:center;
	white-space:nowrap;
	text-overflow:ellipsis;
	border-bottom: 1px solid rgba(0,0,0,0.05);
	border-top: 1px solid rgba(0,0,0,0.05);
}

table img{
	height:auto;
	max-width:100%;
}

table th{
	background-color: #f9f9f9;
	border:1px solid rgba(0,0,0,0.05);
	width: 30% ;
}
table th .stilo2{
	width: 100% !important;
	position: absolute;
}
table a{
	padding: 10px 0;
	text-align:center;
	text-decoration: none;
}


</style>





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
					<article>
						 <center><h1>Mostrar Estado Del Parqueadero</h1></center>
						</br></br></br> 
						 </article>

<?php
include("acciones/conexion.php");
$query="select *from parqueadero";
$resultado=$conexion->query($query);
while($row=$resultado->fetch_assoc()){
?>

<table>
    <tbody>
        <tr>
            <th>Id:</th>
            <td><?php echo $row['id']; ?></td>
        </tr>
        <tr>
            <th>Zona:</th>
            <td><?php echo $row['zona_p']; ?></td>
        </tr>
        <tr>
            <th>Cantidad Lugares:</th>
            <td><?php echo $row['lugares']; ?></td>
        </tr>

    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <th class="stilo2"> <?php echo "<a href='modificar_parqueadero.php?id=$row[id]' >modificar</a> - <a href='acciones/eliminar_parqueadero.php?id=$row[id]'>eliminar</a> <br/><br/>"; ?></th>
         
        </tr>
    </tbody>
</table>
</br></br> 
<?php
}
?>
						<center>
                        <a href="panel-control.php"><div class="boton" >volver</div></a>
                        </center>
<br/>

</div>
			
		</main>
			
	</body>
</html>