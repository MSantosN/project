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
  public $sexo;
  public $foto;
  public $tipo;  
  public $telefonocel;
  public $telefonofijo;


 
  
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
                $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombreUsuario,password,sexo,direccion,localidad,provincia,tipo,email,foto,telefonocel,telefonofijo)values(:paramNombre,:parampass,:paramsexo,:paramDireccion,:paramLocalidad,:paramProvincia,:paramtipo,:paramMail,:paramFoto,:paramtelefonocel,:paramtelefonofijo)");
                $consulta->bindValue(':paramNombre',$this->nombreUsuario, PDO::PARAM_STR);
                $consulta->bindValue(':parampass', $this->pass, PDO::PARAM_STR);
                $consulta->bindValue(':paramsexo', $this->sexo, PDO::PARAM_STR);
                $consulta->bindValue(':paramDireccion', $this->direccion, PDO::PARAM_STR);
                $consulta->bindValue(':paramLocalidad', $this->localidad, PDO::PARAM_STR);
                $consulta->bindValue(':paramProvincia', $this->provincia, PDO::PARAM_STR);
                $consulta->bindValue(':paramtipo', $this->tipo, PDO::PARAM_STR);
                $consulta->bindValue(':paramMail', $this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':paramFoto', $this->foto, PDO::PARAM_STR);
                $consulta->bindValue(':paramtelefonocel', $this->telefonocel, PDO::PARAM_STR);
                $consulta->bindValue(':paramtelefonofijo', $this->telefonofijo, PDO::PARAM_STR);
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

        public function BorrarUsuarioSP()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarUsuario(:id)"); 
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);    
        $consulta->execute();
        return $consulta->rowCount();
   }


        public function Borrarusuario()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("delete from usuarios where idUsuario = :id"); 
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);    
        $consulta->execute();
        return $consulta->rowCount();
   }
public function TraerUnUsuario($idParametro)
{

   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $consulta =$objetoAccesoDato->RetornarConsulta("select idUsuario as id, nombreUsuario, password as pass, direccion, localidad, provincia, email as mail, foto, tipo from usuarios where idUsuario = :idP");
    $consulta->bindValue(':idP',$idParametro,PDO::PARAM_INT);
    $retorno = $consulta->fetchObject('usuario');

}
public static function TraerTodosLosUsuarios()
  {
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
   $consulta =$objetoAccesoDato->RetornarConsulta("select idUsuario as id,nombreUsuario,password as pass,sexo,direccion,localidad,provincia,tipo,email as mail,foto,telefonocel,telefonofijo from usuarios");
   $consulta->execute();           
  return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");
  }
}  
?>