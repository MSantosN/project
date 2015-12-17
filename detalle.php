<?php
class detalle
{

 public $idDetalle;
 public $idPizza;
 public $idVenta;     
 public $cantidad;

 
  
   public static function TraerTodosLosResultados()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodosLosResultados()");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "detalle"); 

   }

   public  function TraerTodosLosDetalles()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select idDetalle, idPizza, idVenta, cantidad,  from detalles");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "detalle"); 

   }
  public function InsertarDetalle()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("insert into detalles (idPizza,idVenta, cantidad)values(:parampizza,:paramVenta,:paramcant)");
                $consulta->bindValue(':parampizza',$this->idPizza, PDO::PARAM_INT);
                $consulta->bindValue(':paramVenta', $this->idVenta, PDO::PARAM_INT);
                $consulta->bindValue(':paramcant', $this->cantidad, PDO::PARAM_INT);
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }

        public function BorrarDetalle()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM detalles WHERE idDetalle = :id");
        $consulta->bindValue(':id',$this->idDetalle, PDO::PARAM_INT);    
        $consulta->execute();
        return $consulta->rowCount();
   }

public function ModificarDetalle()
   {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("
        update detalles 
        set idPizza= :pizza,
        idVenta= :venta,
        cantidad=:cantidad
        WHERE idDetalle=:id");
      $consulta->bindValue(':pizza',$this->idPizza, PDO::PARAM_INT);
      $consulta->bindValue(':venta',$this->idVenta, PDO::PARAM_INT);
      $consulta->bindValue(':cantidad', $this->cantidad, PDO::PARAM_INT);
      $consulta->bindValue(':id', $this->idPizza, PDO::PARAM_INT);
      return $consulta->execute();

   }

public static function TraerUnDetalle($id) 
  {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("select idPizza, idVenta, cantidad from detlles where idDetalle = :id");
      $consulta->bindValue(':id',$id,PDO::PARAM_INT);
      $consulta->execute();
      $pizzaBuscada= $consulta->fetchObject('detalle');
      return $pizzaBuscada;        

    }
   public function GuardarDetalle()
   {

    if($this->idDetalle>0)
      {
        $this->ModificarDetalle();
      }else {
        $this->InsertarDetalle();
      }

   }

   public static function DetalleVenta($idVenta)
   {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("select idDetalle, idPizza, cantidad from detlles where idVenta = :id");
      $consulta->bindValue(':id',$idVenta,PDO::PARAM_INT); 
       $consulta->execute();           
      return $consulta->fetchAll(PDO::FETCH_CLASS, "detalle"); 

   }

}
?>