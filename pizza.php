<?php
class pizza
{

 public $idPizza;
 public $nombre;
 public $ingredientes;     
 public $precio;

 
  
   public static function TraerTodosLosResultados()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodosLosResultados()");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "pizza"); 

   }

   public  function TraerTodasLasPizzas()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select idPizza, Descripcion as nombre, ingredientes, foto, precio from pizzas");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "pizza"); 

   }
  public function InsertarPizza()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("insert into pizzas (Descripcion,Precio, INGREDIENTES)values(:paramNombre,:paramPrecio,:paramIngredientes)");
                $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':paramPrecio', $this->apellido, PDO::PARAM_INT);
                $consulta->bindValue(':paramIngredientes', $this->clave, PDO::PARAM_STR);
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }

        public function Borrarpizza()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM pizzas WHERE idPizza = :id");
        $consulta->bindValue(':id',$this->idPizza, PDO::PARAM_INT);    
        $consulta->execute();
        return $consulta->rowCount();
   }

public function ModificarPizza()
   {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("
        update pizzas 
        set Descripcion=':nombre',
        Precio=':precio',
        INGREDIENTES=':ingredientes'
        WHERE idPizza=':id'");
      $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
      $consulta->bindValue(':precio',$this->precio, PDO::PARAM_INT);
      $consulta->bindValue(':ingredientes', $this->ingredientes, PDO::PARAM_STR);
      $consulta->bindValue(':id', $this->idPizza, PDO::PARAM_STR);
      return $consulta->execute();

   }

public static function TraerUnaPizza($id) 
  {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("select idPizza, Descripcion as nombre, Precio as precio,ingredientes from pizzas where id = $id");
      $consulta->bindValue(':id',$id,PDO::PARAM_INT);
      $consulta->execute();
      $pizzaBuscada= $consulta->fetchObject('pizza');
      return $pizzaBuscada;        

    }
   public function GuardarPizza()
   {

    if($this->id>0)
      {
        $this->ModificarPizza();
      }else {
        $this->InsertarPizza();
      }

   }



}
?>