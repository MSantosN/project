<?php
require_once("usuario.php");
class validadora
{
    
    public static function validarSesionActual()
    {
        if(isset($_SESSION['logueado']) && ($_SESSION['logueado'] != "TestAdmin") && ($_SESSION['logueado'] != "TestUser"))
        {
            $segundos = strtotime(date("Y-m-d H:i:s")) - strtotime($_SESSION['tiempo']);
            if ($segundos <= 900)
            {
                $_SESSION['tiempo']= date("Y-m-d H:i:s");
                return true;
            }
        }
        if (($_SESSION['logueado'] == "TestAdmin") || ($_SESSION['logueado'] == "TestUser") ) 
         {
            return true;
        }
       //deslogear();
    return false;
    }
}
?>