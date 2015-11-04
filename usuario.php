<?php
class usuario
{

  public $id;
  public $nombreUsuario;
  public $pass;
  public $direccion;
  public $localidad;
  public $provincia;
  public $mail;
  public $foto;
  public $tipo;  

 
  
   public static function TraerTodosLosResultados()
   {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodosLosResultados()");
            $consulta->execute();           
            return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 

   }
  public function InsertarUsuario()
     {
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,apellido,legajo,direccion,fecha,email,foto,clave)values(:paramNombre,:paramApellido,:paramLegajo,:paramDireccion,:paramFecha,:paramMail,:paramFoto,:paramClave)");
                $consulta->bindValue(':paramNombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':paramApellido', $this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':paramLegajo', $this->legajo, PDO::PARAM_STR);
                $consulta->bindValue(':paramDireccion', $this->direccion, PDO::PARAM_STR);
                $consulta->bindValue(':paramFecha', $this->fecha, PDO::PARAM_STR);
                $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':paramFoto', $this->foto, PDO::PARAM_STR);
                $consulta->bindValue(':paramClave', $this->clave, PDO::PARAM_STR);
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }
     
     public function validarusuario($usuario,$clave)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select idUsuario as id, nombreUsuario, password as pass, direccion, localidad, provincia, email as mail, foto, tipo from usuarios where email = :mail and password= :pass");
            $consulta->bindValue(':mail',$usuario,PDO::PARAM_STR);
            $consulta->bindValue(':pass',$clave,PDO::PARAM_STR);
            $consulta->execute();   
            if ($consulta->rowCount() == 1) {
                $retorno = $consulta->fetchObject('usuario');
               }  else  {
                $retorno = "no esta en la base";
               } 
            
            return $retorno;

     }

        public function BorrarUsuario()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarUsuario(:id)"); 
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);    
        $consulta->execute();
        return $consulta->rowCount();
   }


   
}
?>