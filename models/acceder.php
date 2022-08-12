<?php
include 'conexion.php';

$CED_EST  = $_GET['CED_EST'];

$sqlselect = "SELECT * FROM estudiantes where CED_EST LIKE '%$CED_EST%'";
$respuesta = $conn->query($sqlselect);
$resultado=array();
    if($respuesta->num_rows>0){
        while($fila = $respuesta->fetch_assoc()){
        array_push($resultado,$fila);
        }
    }else{
        $resultado="No hay estudiantes";
    }
echo json_encode($resultado);
?>