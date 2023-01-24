<?php
//variables de conexion
    $mysqli = new mysqli(
        "localhost",
        "root",
        "",
        "loginSystem"
    );
    
    //condicion para comprobar conexion
    if ($mysqli->connect_errno) {
        # code...
        die("Algo ocurrio mal!!");
    }else {
        # code...
        echo "Conexion Exitosa";
    }
?>