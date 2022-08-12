<?php
class EnlacesPaginas
{
    public static function enlacesPaginasModel($enlacesModel)
    {
        if($enlacesModel== "inicio" ||  
        $enlacesModel== "nosotros" ||
        $enlacesModel== "servicios" ||
        $enlacesModel== "login" ||
        $enlacesModel== "contactanos")
        {
            $module="views/modules/".$enlacesModel.".php";
        }
        else if($enlacesModel=="index")
        {
            $module="views/modules/inicio.php";
        }
        else
        {
            $module="views/modules/inicio.php";
        }
        return $module;

    }
}
?>
