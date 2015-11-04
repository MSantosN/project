<?php 
session_start();
require_once("usuario.php");
require_once("AccesoDatos.php");

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
	
	echo($_SESSION['tipo']);

} else {
	echo ("no esta en la base");
}
?>