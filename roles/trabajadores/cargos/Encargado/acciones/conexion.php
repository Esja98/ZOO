<?php

    $hostname_cn = "localhost";
    $database_cn = "zoo";
    $username_cn = "root";
    $password_cn = "12345678";
    $conexion = mysqli_connect($hostname_cn, $username_cn, $password_cn,$database_cn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>