<?php
include "conexion.php";
$cedula=$_GET['CED_EST'];
$nombre=$_POST['NOM_EST'];
$apellido=$_POST['APE_EST'];
$telefono=$_POST['TEL_EST'];
$direccion=$_POST['DIR_EST'];

$sqlinsert = "UPDATE estudiantes
SET NOM_EST='$nombre',APE_EST='$apellido',TEL_EST='$telefono',DIR_EST='$direccion'
WHERE CED_EST='$cedula'";

if($conn->query($sqlinsert)===TRUE)
{
    echo json_encode("Se actualizo correctamente");
}else
{
    echo json_encode("Error al actualizar estudiante");
}

?>