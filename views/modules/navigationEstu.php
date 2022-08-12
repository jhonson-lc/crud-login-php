<head>
    <meta charset="UTF-8">
</head>
<header>
    <img src="img/banner.jpg" alt="Banner de la página">
</header>
<section>
    <nav>
            <ul>
                <li><a href="indexEstu.php?action=inicio">Inicio</a></li>
                <li><a href="indexEstu.php?action=nosotros">Nosotros</a></li>
                <li><a href="indexEstu.php?action=servicios">Servicios</a></li>
                <li><a href="indexEstu.php?action=contactanos">Contáctanos</a></li>
                <li> <a href="views/modules/Salir.php?action">CERRAR SESION</a></li>
            </ul>
    </nav>
            <?php
            include('models/conexion.php');
            if (empty($_SESSION['user'])) {
                die();
            }else{
            $sesion = "
            select NOM_USU,APE_USU,PER_USU
            from usuarios
            where CED_USU = '".$_SESSION["user"]."'
            ";
            $resultado2 = mysqli_query($conn, $sesion);
            $sesionUser = mysqli_fetch_array($resultado2);
            echo '<div style="position:absolute;right:0;padding:4px">
                        <span>'.$sesionUser[2].': '.$sesionUser[0].' '.$sesionUser[1].'</span>
                      </div>';
            }
        ?>
</section>