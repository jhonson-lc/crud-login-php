<?php
 include "models/conexion.php";
 $ejecutar = mysqli_query($conn, "SELECT * FROM direcciones");
 while ($valores = mysqli_fetch_array($ejecutar)) {
     echo '<option value="' . $valores['NOM_DIR'] . '">' . $valores['NOM_DIR'] . '</option>';
 }
 mysqli_close($conn);
 ?>