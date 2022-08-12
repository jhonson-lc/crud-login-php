<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="JQuery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="JQuery/themes/icon.css">
    <script type="text/javascript" src="JQuery/jquery.min.js"></script>
    <script type="text/javascript" src="JQuery/jquery.easyui.min.js"></script>
    <link rel=stylesheet href="css/styles.css">
</head>

<body>
    <?php
    include "modules/navigation.php";
    ?>
    <section>
        <?php
        $mvc = new MvcController();
        $mvc->enlacesPaginasController();
        ?>
    </section>
    <footer>
        <p class="footer">Derechos Reservados &copy; Cuarto Software</p>
    </footer>
</body>

</html>