<?php
include "conexion.php";
$cedula=$_POST['CED_EST'];
$nombre=$_POST['NOM_EST'];
$apellido=$_POST['APE_EST'];
$telefono=$_POST['TEL_EST'];
$direccion=$_POST['DIR_EST'];

$sqlinsert = "INSERT INTO estudiantes(CED_EST,NOM_EST,APE_EST,TEL_EST,DIR_EST,EST_EST)
VALUES('$cedula','$nombre','$apellido','$telefono','$direccion','I');";

if($conn->query($sqlinsert)===TRUE)
{
    echo json_encode("Se registro correctamente");
}else
{
    echo json_encode("Error al registrar estudiante");
}

?>