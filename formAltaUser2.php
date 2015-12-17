<?php 

$mail = $_POST['mail'];
$foto = $_POST['fotot'];
$user = $_POST['userNam'];
$pass = $_POST['passw'];
$sexo = $_POST['sex'];
$id   = $_POST['idP'];
$queHagoConFoto = $_POST['queHacerConFoto'];
if (isset($_POST['direc']))
{
   $args=$_POST['arg'];
   $direcc=$_POST['direc'];
   $loca=$_POST['loc'];
   $pro=$_POST['prov'];
   $tip=$_POST['tipo'];
    if (isset($_POST['telfijo'])) {
    	 $telfij=$_POST['telfijo'];
    }
    if (isset($_POST['telcel'])) {
    	 $telce=$_POST['telcel'];
    }
   
  
} 

require_once("usuario.php");

	$titulo = "Carga de Usuario 2/2";
	
require_once("provincias.php");

$provinciass = provincias::TraerProvincias();


?>
<script type="text/javascript">
function Liberar()
{
	document.getElementById('Prov').disabled = false;
	document.getElementById('Argentino').check();
	
}

function Blockear()
{
document.getElementById('Prov').disabled = true;
document.getElementById('Loc').disabled = true;
document.getElementById('Dire').disabled = true;
document.getElementById('Extranjero').check();

}
function HabilitarLoc()
{
	document.getElementById('Loc').disabled = false;
	document.getElementById('Dire').disabled = false;
}

  function HabilitarPorCheckbox(idCheckBox, idTextArea)
    {
       
        if (document.getElementById(idCheckBox).checked) 
        {
          document.getElementById(idTextArea).disabled=false;
        }
        else
        {
          document.getElementById(idTextArea).disabled=true;
        }
       }

</script>

<form id="FormIngreso" method="post" class="form-ingreso"  style="margin-left:150px;" enctype="multipart/form-data" >
		<h3 class="form-ingreso-heading" style="    font-size: xx-large; font-family: sans-serif"> <?php echo $titulo; ?> </h3>
	<fieldset>	
		<h4> Es usted de Argentina? </h4>
		 <input type="radio" name="Argentino" id="Argentino" value="Si" onClick="Liberar()"<?php if( (isset($args)) && ($args)){echo 'checked'; } ?>> Si   
  				  
  		 <input type="radio" name="Argentino" id="Extranjero" value="No" onClick="Blockear()"<?php if(isset($args) && !($args)) {echo 'checked'; } ?>> No
		<br><br>
  		 <input type="text" class="form-control" id="Prov" list="Provincias" placeholder="Escriba su provincia..."  onblur="HabilitarLoc();return false"value="<?php if(isset($pro)) {echo ($pro);} ?>"/>
<datalist id="Provincias" class="">
	<?php
	foreach ($provinciass as  $provincias) 
	{
		echo "<option>" . $provincias->provincia . "</option>";
	}
	?>
</datalist>

 <input type="text" class="form-control" id="Loc" placeholder="Escriba su Localidad..."  value="<?php if(isset($loca)) {echo ($loca);} ?>"/>
 <input type="text" class="form-control" id="Dire" placeholder="Escriba su Direccion..."  value="<?php if(isset($direcc)) {echo ($direcc);} ?>" />
	
			<h4>Contacto</h4> 
            
                    <input type="checkbox" class="form-control" id="telefonocelular" onclick="HabilitarPorCheckbox('telefonocelular','tcelular')"> Teléfono celular: </input> 
                    <input type="text"  style= "width: 150px; height: 20px;"id="tcelular"  disabled placeholder= "Telefono Celular..." value="<?php if(isset($telce)) {echo ($telce);} ?>" > </input> </br>
                    <input type="checkbox" class="form-control" id="telefonofijo" onclick="HabilitarPorCheckbox('telefonofijo','telfijo')" > Teléfono fijo: <span>  </span>   </input> 
                    <input type="text" style ="width: 150px; height: 20px;margin-left: 17px; ; "id="telfijo" placeholder="Telefono fijo..." value="<?php if(isset($telfij)) {echo ($telfij);} ?>" disabled > </input> </br>
         
            <h4> Tipo de Usuario </h4>
            <input type="radio" name="tipoUsuario" class="" id="userComun" value ="Normal" <?php if( (isset($tip)) && ($tip != "Administrador")){echo 'checked'; } ?>    > Normal  <br> </input>
             <input type="radio"name="tipoUsuario" class="" id="userAdmin" value = "Administrador" <?php if( (isset($tip)) && ($tip == "Administrador")){echo 'checked'; } ?>  > Administrador</input> 

		<a class="btn-info form-control" style="text-align:center; cursor:pointer;" name="guardar" onclick="GuardarUsuario();return false" > <span class="glyphicon glyphicon-floppy-save">&nbsp;</span> Guardar</a>
		<input type="hidden" value="<?php echo $idPara; ?>" id="idParaModificar" name="agregar" />

<input type="hidden" name="fotoOculta" id="fotoOc" value="<?php echo ($foto)  ; ?>" />
<input type="hidden" name="mailOculto" id="mailOc" value="<?php echo ($mail)  ; ?>" />
<input type="hidden" name="sexoOculto" id="sexoOc" value="<?php echo ($sexo)  ; ?>" />
<input type="hidden" name="userOculto" id="userOc" value="<?php echo ($user) ; ?>" />
<input type="hidden" name="passOculta" id="passOc" value="<?php echo ($pass); ?>" />
<input type="hidden" name="idOculto" id="idOc" value="<?php echo ($id); ?>" />
<input type="hidden" name="accionFotoOc" id="accionFoto" value="<?php echo ($queHagoConFoto); ?>" />
	</fieldset>				


			
</form>
