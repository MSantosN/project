<?php
session_start();
require_once("AccesoDatos.php");
require_once("pizza.php");
require_once("usuario.php");
require_once("venta.php");
require_once("detalle.php");

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
			include("FormLogueado.php"); 
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
		case 'TraerNombrePizza':
			$pizza = pizza::TraerUnaPizza($_POST['idpizza']);		
			echo($pizza->nombre);

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
		$usuario->id=$_POST['idP'];
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
		$idInsertado=$usuario->GuardarUsuario();
		echo $idInsertado;
		break;
case 'VerEnMapa':        
        include("formMapa.php");
		break;
		case 'VerTiendas':
		include("formTiendas.php");
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

		case 'Privacidad':
		include("private.html");
		break;

		case 'ContactoAdmin':
		include("grillaAdmins.php");
		break;
 case 'guardarMarcadores':
        if(isset($_POST["marcadores"]))
        {
            $filename = "ArchivosTxt/marcador".   ".txt";

            $_SESSION['file'] = $filename;
            $puntos = $_POST["marcadores"];

            $file = fopen($filename, "w");

            foreach ($puntos as $valor)
            {
                $lat =  $valor["lat"];
                $lng =  $valor["lng"];
                $nombre =  $valor["nombre"];
                fwrite($file, $lat.">".$lng.">".$nombre . PHP_EOL);
            }
        fclose($file);

        echo "Marcadores guardados con exito";
        }
        else
            echo "No ingreso marcador/es a guardar";
        break;
	case 'Ofertas':
	include("formOfertas.html");
	break;
	case 'Venta':
	include("formVenta.php");
	break;
	case 'TraerPrecio':        
        $pizzaBuscada = pizza::TraerUnaPizza($_POST['idpizza']);
        echo $pizzaBuscada->precio;	
		break;
		case 'Guardarventa':
			$venta = new venta();
			$venta->idventa=$_POST['id'];
			$venta->fecha=$_POST['fecha'];
			$venta->idVendor=$_POST['idVendor'];
			$venta->direccion=$_POST['direccion'];
			$venta->localidad=$_POST['localidad'];
			$venta->provincia=$_POST['provincia'];
			$cantidad=$venta->GuardarVenta();
			echo $cantidad;

		break;
		case 'Guardardetalle':
			$detalle = new detalle();
			$detalle->idPizza=$_POST['idPizza'];
			$detalle->idVenta=$_POST['idVenta'];
			$detalle->cantidad=$_POST['cantidad'];
			$cantidad=$detalle->GuardarDetalle();
			echo $cantidad;

		break;
default:
		# code...
		break;


}




?>