<?php
class MvcControllerEstu
{
    public function plantillaEstu()
    {
        include "views/templateEstu.php";
    }

    public function enlacesPaginasControllerEstu()
    {
        if(isset($_GET["action"]) )
        {
            $enlacesController= $_GET["action"];
        }
        else
        {
            $enlacesController="inicio.php";
        }
        $respuesta= EnlacesPaginas::enlacesPaginasModel($enlacesController);
        include $respuesta;

    }
}
