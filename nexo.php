<?php
session_start();
require_once("AccesoDatos.php");
require_once("pizza.php");
require_once("usuario.php");
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
   		 {	include ("menuUser.php");}
   		 
	} else
	{
		include ("menuTerceros.php");  
	}
		break;

		case 'Mostrarlogin':
		if (isset($_SESSION['tipo'])) 
		{

			if ($_SESSION['tipo'] == "Administrador")
			 {
		 	include("formLogueadoAdmin.php");
		
			}else {
			if ($_SESSION['tipo'] == "User") 
			{include("FormLogueado.php");} 
				}
			} else{
			include ("formLogin.php");
			}
			break;
	
	case 'Registrar':
		include("FormRegistrar.html");
			break;
	case 'MostrarErrorlog':
		include("ErrorLogin.html");
		break;
		
		break;
	case 'email':
	include("formMail.html");
	break;

	case 'Borrarpizza':
	$pizza = new pizza();
		$pizza->idPizza=$_POST['id'];
		$cantidad=$pizza->Borrarpizza();
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

		break;
	case 'MostrarAltaPizza':
		include("formPizza.php");
		break;

case 'MostrarAltauser':
		include("formAltaUsuario.php");
		break;

		case 'Alta2':
		include("formAltaUser2.php");
		break;
 case 'GuardarUser':
			
		$usuario = new usuario();
		$usuario->id=$_POST['id'];
		$usuario->nombreUsuario=$_POST['nombre'];
		$usuario->pass=$_POST['pass'];
		$usuario->sexo=$_POST['sexo'];
        $usuario->mail=$_POST['mail'];
        $usuario->provincia=$_POST['provincia'];
        $usuario->localidad=$_POST['localidad'];
        $usuario->direccion=$_POST['direccion'];
        if (isset($_POST['telefonofijo'])) 
       		 {
       	 	 $usuario->telefonofijo=$_POST['telefonofijo'];
       		 }
        if (isset($_POST['telefonocelular'])) 
        	{
        	 $usuario->telefonocelular=$_POST['telefonocelular'];
       		 }    
        
        $usuario->tipo=$_POST['tipo'];
        $foto = $_POST['foto'];
        $queHagoConLaFoto = $_POST['queHacerConLaFoto']; 
		
		if ($queHagoConLaFoto == 'nueva')
		  {        
			$ruta=getcwd();  //ruta directorio actual
	        $rutaDestino=$ruta."/Fotos/";
	    	//$NOMEXT=explode(".", $_FILES['fichero0']['name']);
	    	$NOMEXT=explode(".", $foto);
	        $EXT=end($NOMEXT);
	        $nomarch=$NOMEXT[0].".".$EXT;  // no olvidar el "." separador de nombre/ext
	        $rutaActual = $ruta."/FotosTemp/".$nomarch;

	        $nuevoNombreDeFoto = str_replace(' ', '', $usuario->nombreUsuario);
	        $nuevoNombreDeFoto = $nuevoNombreDeFoto.date("Y").date("m").date("d").date("H").date("i").date("s").".".$EXT;
	        $nuevoNombreDeFoto = str_replace(' ', '', $nuevoNombreDeFoto); 

	        rename ($ruta."/FotosTemp/".$nomarch,$ruta."/FotosTemp/".$nuevoNombreDeFoto);
	        $rutaActual = $ruta."/FotosTemp/".$nuevoNombreDeFoto;
	        echo $nomarch;
	        echo "	</br>";
	        echo $rutaActual;
	         echo "	</br>";
	        echo $rutaDestino.$nuevoNombreDeFoto;
	         echo "	</br>";
	        //Muevo a carpeta Fotos
			rename($rutaActual,$rutaDestino.$nuevoNombreDeFoto);
			$usuario->foto=$nuevoNombreDeFoto;	
		  }	
		 
		if 	($queHagoConLaFoto == 'existe')
		  {
		  	$usuario->foto = $foto;
		  }					
  	
		  
		if 	($queHagoConLaFoto == 'noesta')
		  {
		  	$usuario->foto = 'no_image_for_this_product.gif';
		  }					

		$idInsertado=$usuario->InsertarUsuario();
		echo $idInsertado;
		break;
case 'VerEnMapa':        
        include("formMapa.php");
		break;
		case 'MostrarGrillaUsuario':
		include("grillaUsuario.php");
	break;
		case 'TraerUsuario':
		$usuario = usuario::TraerUnUsuario($_POST['id']);		
		echo json_encode($usuario);
		break;

		case 'Borraruser':
		$usuario = new usuario();
		$usuario->id = $_POST['id'];
		$cantidad=$usuario->Borrarusuario();
		break;
		case 'MostrarAbout':
		include("about.html");
		break;

default:
		# code...
		break;


}




?>