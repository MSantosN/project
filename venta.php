<?php
class venta
{

 public $idVenta;
 public $fecha;
 public $metodoPago;     
 public $idVendedor;
 public $montoTotal;
 public $direccion;
 public $localidad;
 public $provincia;
 
  
   public static function TraerTodosLosResultados()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodosLosResultados()");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "venta"); 

   }

   public  function TraerTodasLasVentas()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select idVenta, fecha, metodoPago, idVendedor, montoTotal, direccion, provincia, localidad from ventas");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "venta"); 

   }
  public function InsertarVenta()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("insert into Ventas (fecha, metodoPago, idVendedor, montoTotal, direccion, provincia, localidad)values(:fechaP, :metodoPagoP, :idVendedorP, :montoTotalP, :direccionP, :provinciaP, :localidadP)");
                $consulta->bindValue(':fechaP',$this->fecha, PDO::PARAM_STR);
                $consulta->bindValue(':metodoPagoP',$this->metodoPago, PDO::PARAM_STR);
                $consulta->bindValue(':idVendedorP',$this->idVendedor, PDO::PARAM_INT);
                $consulta->bindValue(':montoTotalP',$this->montoTotal, PDO::PARAM_INT);
                $consulta->bindValue(':direccionP', $this->direccion, PDO::PARAM_STR);
                $consulta->bindValue(':provinciaP', $this->provincia, PDO::PARAM_STR);
                $consulta->bindValue(':localidadP', $this->localidad, PDO::PARAM_STR);
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }

        public function BorrarVenta()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM Ventas WHERE idVenta = :id");
        $consulta->bindValue(':id',$this->idVenta, PDO::PARAM_INT);    
        $consulta->execute();
        return $consulta->rowCount();
   }

public function ModificarVenta()
   {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("
        update ventas 
        set fecha = :fechaP,
        metodoPago = :metodoPagoP,
        idVendedor=:idVendedorP,
        montoTotal=:montoTotalP,
        direccion=:direccionP,
        provincia=:provinciaP,
        localidad=localidadP
        WHERE idVenta=:id");
      $consulta->bindValue(':fechaP',$this->fecha, PDO::PARAM_STR);
      $consulta->bindValue(':metodoPagoP',$this->metodoPago, PDO::PARAM_STR);
      $consulta->bindValue(':idVendedorP',$this->idVendedor, PDO::PARAM_INT);
      $consulta->bindValue(':montoTotalP',$this->montoTotal, PDO::PARAM_INT);
      $consulta->bindValue(':direccionP', $this->direccion, PDO::PARAM_STR);
      $consulta->bindValue(':provinciaP', $this->provincia, PDO::PARAM_STR);
      $consulta->bindValue(':localidadP', $this->localidad, PDO::PARAM_STR);
      $consulta->bindValue(':id', $this->idVenta, PDO::PARAM_INT);
      return $consulta->execute();

   }

public static function TraerUnaVenta($id) 
  {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("select fecha, metodoPago, idVendedor, montoTotal, direccion, provincia, localidad from ventas where idVenta = :id");
      $consulta->bindValue(':id',$id,PDO::PARAM_INT);
      $consulta->execute();
      $ventaBuscada= $consulta->fetchObject('venta');
      return $ventaBuscada;        

    }
   public function GuardarVenta()
   {

    if($this->idVenta>0)
      {
        $this->ModificarVenta();
      }else {
        $this->InsertarVenta();
      }

   }



}
?>