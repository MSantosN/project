		
		<link rel="stylesheet" type="text/css" href="css/animacion.css">
		<!--final de Estilos-->
		<script type="text/javascript" src="./bower_components/jquery/dist/jquery.js"></script>
		<script type="text/javascript" src="./js/url.js"></script>
		<script type="text/javascript" src="js/ValidacionjavaScript.js"></script>
		<script type="text/javascript"> 
		$(document).ready(function()
		{
			var a = $("<div/>").css({height:0,width:0,'overflow':'hidden'});
			var b = $("#imagen").wrap(a);
		});

		</script>


<?php     
	require_once("usuario.php");

	$titulo = "Carga de Usuario 1/2";
	$idPara=0;

?>

		<div class="CajaInicio animated bounceInRight" style="margin-left:150px;">
			<h3 class="form-ingreso-heading"> <?php echo $titulo; ?> </h3>
			<!--  -->
			<form id="FormIngreso" method="post" onsubmit="ContinuarRegistro();return false" class="form-ingreso" enctype="multipart/form-data" >
				
				<input type="text" name="userName" class="form-control" id="userName" placeholder="Nombre de usuario" required="" value="<?php echo isset($unaPersona) ?  $unaPersona->nombreUsuario  : "" ; ?>" />
				
				<input type="email" name="email" class="form-control" id="email"  required placeholder="Email" value="<?php echo isset($unaPersona) ?  $unaPersona->mail : "" ; ?>" /> 
				<input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo isset($unaPersona) ?  $unaPersona->pass : "" ; ?>" required    /> 

				  <input type="radio" name="sex" id="Masculino" value="Masculino" checked> Masculino   
  				  
  				  <input type="radio" name="sex" id="Femenino" value="Femenino"> Femenino

				<input type="hidden" name="idOculto" id="id" value="<?php echo isset($unaPersona) ? $unaPersona->id : "" ; ?>" />
				<input type="file" name="imagen" id="fichero" onchange="cargarFoto();return false"  ></input>

				<img  src="<?php echo isset($unaPersona) ? $unaPersona->foto : "pordefecto.png" ; ?>" class="fotoform" id="imagen"/>

				<p style="color: black;">*La foto se actualiza al guardar.</p>

																														
				<input class="btn-info form-control" type="submit" style="text-align:center;" name="guardar" value="<?php echo "Continuar"	; ?>"></input>

				<input type="hidden" value="<?php echo $idPara; ?>" id="idParaModificar" name="agregar" />
				<input type="hidden" value="" id="hdnAgregar" name="agregar" />
			<input type="hidden" name="argentino" id="argOc" />
			<input type="hidden" name="direccion" id="direccionOc" />
			<input type="hidden" name="localidad" id="localidadOc"  />
			<input type="hidden" name="provincia" id="provOc" />
			<input type="hidden" name="telfijo" id="telfijoOc"  />
			<input type="hidden" name="telcel" id="telcelOc"  />
			<input type="hidden" name="tipo" id="tipoOc" />


				</form>

				</div>

		
		
<?php 

if(isset($_POST['agregar']) && $_POST['agregar'] === "Guardar")// si esto no se cumple ingreso por primera vez.
{


	if($_POST['idOculto'] != "")//Solo para la foto
	{
		$$usuario = usuario::TraerUnUsuario($_POST['id']);
		$foto=$usuario->foto;
		
	}else
	{
		$foto="pordefecto.png";
	}

	

	if(!isset($_FILES["foto"]))
	{
		// no se cargo una imagen
	}
	else
	{
		if($_FILES["foto"]['error'])
		{
			//error de imagen
		}
		else
		{
			$tamanio =$_FILES['foto']['size'];
    		if($tamanio>1024000)
    		{
    				// "Error: archivo muy grande!"."<br>";
    		}
    		else
    		{
    			//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
				//IMAGEN, RETORNA FALSE
				$esImagen = getimagesize($_FILES["foto"]["tmp_name"]);
				if($esImagen === FALSE) 
				{
							//NO ES UNA IMAGEN
				}
				else
				{
					$NombreCompleto=explode(".", $_FILES['foto']['name']);
					$Extension=  end($NombreCompleto);
					$arrayDeExtValida = array("jpg", "jpeg", "gif", "bmp","png");  //defino antes las extensiones que seran validas
					if(!in_array($Extension, $arrayDeExtValida))
					{
					   //"Error archivo de extension invalida";
					}
					else
					{
						//$destino =  "fotos/".$_FILES["foto"]["name"];
						$destino =  $_FILES['foto']['name'];//.".".$Extension;
						$foto=$_POST['userName'].".".$Extension;
						//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
    					if (move_uploaded_file($_FILES["foto"]["tmp_name"],$destino))
    					{		
      						 echo "ok";
      					}
      					else
      					{   
      						// algun error;
      					}



					}

				}
    		}			
		}
	}






	// if($_POST['idOculto'] != "")//paso por grilla y luego guardo
	// {
	// 	$PersonaBuscada = Persona::TraerUnaPersona($_POST['idOculto']);
	// 	$PersonaBuscada->SetFoto($foto);
	// 	$PersonaBuscada->SetApellido($_POST['apellido']);
	// 	$PersonaBuscada->SetNombre($_POST['nombre']);
	// 	//$PersonaBuscada->SetDni($_POST['dni']);		
	// 	$retorno = Persona::ModificarPersona($PersonaBuscada);
	// }
	// else// si es un alta
	// {
	// 	$PersonaNueva = new Persona();	
	// 	$PersonaNueva->SetFoto($foto);
	// 	$PersonaNueva->SetApellido($_POST['apellido']);
	// 	$PersonaNueva->SetNombre($_POST['nombre']);
	// 	$PersonaNueva->SetDni($_POST['dni']);
	// 	persona::InsertarPersona($PersonaNueva);

	// }	
}
?>
	