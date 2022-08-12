<?php
class MvcControllerAdmin
{
    public function plantillaAdmin()
    {
        include "views/templateAdmin.php";
    }

    public function enlacesPaginasControllerAdmin()
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
