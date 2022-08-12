<?php
    	$servername="br8ci1y2h5jbgtbdlkeh-mysql.services.clever-cloud.com";
        $username="uafziyg7bdppjgp7";
        $password="wmg6pwxvGw8t9X1V6Nf6";
        $dbname="br8ci1y2h5jbgtbdlkeh";
    $conn= mysqli_connect($servername,$username,$password,$dbname);
    $mysqli = new mysqli($servername,$username,$password,$dbname);
    if(!$mysqli)
    {
        die("Error en la conexion".mysqli_connect_error());
    }
?>