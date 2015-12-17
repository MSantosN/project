<?php 
session_start();
if (isset($_POST['master']))
 {
 	if ($_POST['master'] == "Administrador") {
 		$_SESSION['logueado'] = "TestAdmin";
 		$_SESSION['tipo'] = "Administrador";
 		echo($_SESSION['tipo']);
 	} else
 	{
 		$_SESSION['logueado'] = "TestUser";
 		$_SESSION['tipo'] = "User";
 		echo($_SESSION['tipo']);
  	}
}
if (!(isset($_POST['master']))) 
{
require_once("usuario.php");
require_once("AccesoDatos.php");
require_once("validadora.php");

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];
$miusuario = usuario::validarusuario($usuario,$clave);


if($miusuario != "no esta en la base")
{	
		if($recordar)
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');
		
	}

	$_SESSION['logueado'] = $miusuario->nombreUsuario;
	$_SESSION['tipo'] = $miusuario->tipo;
	$_SESSION['tiempo']= date("Y-m-d H:i:s");
	echo($_SESSION['tipo']);

} else {
	echo ("no esta en la base");
}	
}

?>