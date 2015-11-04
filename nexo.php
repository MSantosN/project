<?php
session_start();
require_once("AccesoDatos.php");
require_once("pizza.php");
$wtd = $_POST['queHacer'];

switch ($wtd)

 {
	case 'Menu':
	if (isset($_SESSION['tipo'])) 
	{
		if ($_SESSION['tipo'] == "Administrador")
	 	{
	 	include("menuAdmin.php");
   		 } else
   		 {	include ("menu.php");}
   		 
	} else
	{
		include ("menuTerceros.php");  
	}

		break;
		case 'Mostrarlogin':
			include ("formLogin.php");
			break;
	
	case 'Registrar':
		include("FormRegistrar.html");
			break;
	case 'MostrarErrorlog':
		include("ErrorLogin.html");
		break;
	case 'MostrarFormlogueado':
		include("FormLogueado.php");
		break;
	case 'email':
	include("formMail.html");
	break;

	case 'Borrarpizza':
	$pizza = new pizza();
		$pizza->idPizza=$_POST['id'];
		$cantidad=$pizza->Borrarpizza();
	break;

	case 'MostrarLogADM':
	include("formLogueadoAdmin.php");
	break;
			case 'Guardarpizza':
			$pizza = new pizza();
			$pizza->idPizza=$_POST['id'];
			$pizza->nombre=$_POST['nombrePizza'];
			$pizza->precio=$_POST['precio'];
			$pizza->ingredientes=$_POST['ingredientes'];
			$cantidad=$pizza->GuardarPizza();
			echo $cantidad;

		break;
	case 'TraerPizza':
			$pizza = pizza::TraerUnaPizza($_POST['id']);		
			echo json_encode($pizza);
			include ("formPizza.php");

		break;
	case 'MostrarAltaPizza':
		include("formPizza.php");
		break;
case 'MostrarAltauser':
		include("formUsuario.php");
		break;

default:
		# code...
		break;


}




?>