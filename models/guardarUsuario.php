<?php
include "conexion.php";
$cedula=$_POST['cedula'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$contrasena=$_POST['contrasena'];

$sqlinsert = "INSERT INTO usuarios(CED_USU,NOM_USU,APE_USU,CON_USU,PER_USU)
VALUES('$cedula','$nombre','$apellido','$contrasena','USUARIO');";

if($conn->query($sqlinsert)===TRUE)
{
    echo json_encode("Se registro correctamente");
}else
{
    echo json_encode("Error al registrar estudiante");
}

?>