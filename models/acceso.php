<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: application/json');
include 'conexion.php';
$op=$_POST['op'];
if($op===null)
{
    echo "Error";
}
else{
switch($op)
{
        case 'insertAlumno':
            header('Content-Type: application/json');
            $cedula=$_POST['CED_EST'];
            $nombre=$_POST['NOM_EST'];
            $apellido=$_POST['APE_EST'];
            $direccion=$_POST['DIR_EST'];
            $telefono=$_POST['TEL_EST'];
            $sexo=$_POST['SEX_EST'];
            $curso=$_POST['NUM_CUR'];
            $sqlInsert="INSERT INTO estudiantes(CED_EST,NOM_EST,APE_EST,DIR_EST,TEL_EST,SEX_EST, CUR_EST) 
                        VALUES ('$cedula','$nombre','$apellido','$direccion','$telefono','$sexo','$curso')";
            if($mysqli->query($sqlInsert)===TRUE)
            {
            echo json_encode("Se guardo correctamente");
            }
            else
            {
            echo $mysqli->error."\n";
            echo "Error ".$sqlInsert;
            }
            $mysqli->close();
        break;
        

            case 'updateAlumno':
                header('Content-Type: application/json');
                $cedula=$_POST['CED_EST'];
                $nombre=$_POST['NOM_EST'];
                $apellido=$_POST['APE_EST'];
                $direccion=$_POST['DIR_EST'];
                $telefono=$_POST['TEL_EST'];
                $sexo=$_POST['SEX_EST'];
                $curso=$_POST['NUM_CUR'];

                $sqlUpdate="UPDATE estudiantes SET NOM_EST = '$nombre', APE_EST = '$apellido' ,DIR_EST = '$direccion' ,TEL_EST = '$telefono',  CUR_EST = '$curso', SEX_EST = '$sexo' WHERE CED_EST = $cedula";
                if($mysqli->query($sqlUpdate)===TRUE)
                {
                echo json_encode("Se actualizo correctamente");
                }
                else
                {
                echo "Error:".$sqlUpdate."<br>".$mysqli->error;
                }
                $mysqli->close();
            break;

            case 'deleteAlumno':
                header('Content-Type: application/json');
                $cedula=$_POST['CED_EST'];
                if(isset($cedula)){
                $sqlDelete="DELETE FROM estudiantes WHERE CED_EST = $cedula";
                 $resultado= $mysqli->query($sqlDelete);
                 echo json_encode(array("Estudiante borrado" => $resultado));
                 $mysqli->close();
            }
              
            break;
}
}

?>
