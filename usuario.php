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
public static function TraerUnUsuario($idParametro)
{

   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $consulta =$objetoAccesoDato->RetornarConsulta("select idUsuario as id,nombreUsuario,password as pass,sexo,direccion,localidad,provincia,tipo,email as mail,foto,telefonocel,telefonofijo from usuarios where idUsuario = :idP");
    $consulta->bindValue(':idP',$idParametro,PDO::PARAM_INT);
    $consulta->execute();
    $retorno = $consulta->fetchObject('usuario');
    return $retorno;

}
public static function TraerUnUsuarioPorNombre($nombreParametro)
{

   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $consulta =$objetoAccesoDato->RetornarConsulta("select idUsuario as id,nombreUsuario,password as pass,sexo,direccion,localidad,provincia,tipo,email as mail,foto,telefonocel,telefonofijo from usuarios where nombreUsuario = :nombreP");
    $consulta->bindValue(':nombreP',$nombreParametro,PDO::PARAM_STR);
    $consulta->execute();
    $retorno = $consulta->fetchObject('usuario');
    return $retorno;

}
public static function TraerTodosLosUsuarios()
  {
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
   $consulta =$objetoAccesoDato->RetornarConsulta("select idUsuario as id,nombreUsuario,password as pass,sexo,direccion,localidad,provincia,tipo,email as mail,foto,telefonocel,telefonofijo from usuarios");
   $consulta->execute();           
  return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");
  }
public function ModificarUsuario()
   {
     $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("
        UPDATE usuarios set nombreUsuario=:pnombre,password=:ppass,sexo=:psexo,Direccion=:pdirec,
                   Localidad=:ploc,Provincia=:pprov,email=:pmail,foto=:pfoto,tipo=:ptip,
                   telefonocel=:ptcelular,
                   telefonofijo=:ptfijo
        WHERE idUsuario = :pid");
      $consulta->bindValue(':pid',$this->id,PDO::PARAM_INT);
      $consulta->bindValue(':pnombre',$this->nombreUsuario,PDO::PARAM_STR);
      $consulta->bindValue(':ppass',$this->pass,PDO::PARAM_STR);
      $consulta->bindValue(':psexo',$this->sexo,PDO::PARAM_STR);
      $consulta->bindValue(':pdirec',$this->direccion,PDO::PARAM_STR);  
      $consulta->bindValue(':pprov',$this->provincia,PDO::PARAM_STR);
      $consulta->bindValue(':ploc',$this->localidad,PDO::PARAM_STR);
      $consulta->bindValue(':pmail',$this->mail,PDO::PARAM_STR);
      $consulta->bindValue(':pfoto',$this->foto,PDO::PARAM_STR);
      $consulta->bindValue(':ptip',$this->tipo,PDO::PARAM_STR);
      $consulta->bindValue(':ptcelular',$this->telefonocel,PDO::PARAM_STR);
      $consulta->bindValue(':ptfijo',$this->telefonofijo,PDO::PARAM_STR);
      
      return $consulta->execute();

   }

 public function GuardarUsuario()
   {
    if($this->id>0)
      {
        $this->ModificarUsuario();
      }else {
        $this->InsertarUsuario();
      }

   }
}
?>