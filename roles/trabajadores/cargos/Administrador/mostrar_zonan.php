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
    max-height: 250px;
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

<?php
include("acciones/conexion.php");
$query="select *from zona_n";
$resultado=$conexion->query($query);

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
            
            <div class="contenedorusuario">

                    <div class="usuarioicono">

<?php

while($row=$resultado->fetch_assoc()){
?>

<table>
    <tbody>
        <tr>
            <th>nombre zona natural:</th>
            <td><?php echo $row['nombre_zn']; ?></td>
        </tr>
        <tr>
            <th>descripcion zona natural:</th>
            <td><?php echo $row['des_zn']; ?></td>
        </tr>

    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <th class="stilo2"><?php echo "<a href='modificar_zonan.php?nombre_zn=$row[nombre_zn]'>modificar</a> - <a href='acciones/eliminar_zonan.php?nombre_zn=$row[nombre_zn]' >eliminar</a> <br/><br/>"; ?></th>
        </tr>
    </tbody>
</table>
<br/>
<?php
}
?>

                        <center>
                        <a href="panel-control.php"><div class="boton" >volver</div></a>
                        </center>


                </div>
            </div>
            
        </main>
            
    </body>
</html>