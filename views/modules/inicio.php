<?php 
    include('models/conexion.php');
    
    if (empty($_SESSION['user'])) {
        echo '<div><h2 style="padding:15px;">Sistema de estudiantes</h2>
        <h4 style="padding:15px;">Aún no has iniciado sesión</h4>
        <img src="img/login.svg" height="550"></div>';
        die();
    }else{
        $sesion = "
        select NOM_USU,APE_USU
        from usuarios
        where CED_USU = '".$_SESSION["user"]."'
        ";
        $resultado2 = mysqli_query($conn, $sesion);
        $sesionUser = mysqli_fetch_array($resultado2);
    }
 ?>
<html>
    <h2 style="padding:15px;">Ya estás iniciado sesión :  <?php echo $sesionUser["NOM_USU"] ," ", $sesionUser["APE_USU"]?></h2>
    <img src="img/perfil.svg" height="550">
</html>
