<?php
include "conexion.php";
$query = "SELECT * FROM estudiantes";
if (isset($_POST['CED_EST']) != "") {
    $q = $conn->real_escape_string($_POST['CED_EST']);
    $query = "SELECT * FROM estudiantes WHERE CED_EST LIKE '%" . $q . "%'";
}
$buscarAlumno = $conn->query($query);
$result = array();
if ($buscarAlumno->num_rows > 0) {
    while ($filaAlumno = $buscarAlumno->fetch_assoc()) {
        array_push($result, $filaAlumno);
    }
} else {
    $result = "No se encontraron estudiantes";
}
mysqli_close($conn);
echo json_encode($result);
?>
