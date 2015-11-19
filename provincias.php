<?php
class provincias
{
 public $id;
 public $nombre;

 public static function TraerProvincias()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from provincias");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "provincias"); 

   }

	
}
?>