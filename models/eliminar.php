<?php
include "conexion.php";
$cedula=$_POST['CED_EST'];
$sqldelete = "DELETE FROM estudiantes WHERE CED_EST='$cedula'";

if($conn-> query($sqldelete)===TRUE){
    echo json_encode("Se elimino correctamente");
}else{
    echo json_encode("ERROR");
}
$conn->close();
?>