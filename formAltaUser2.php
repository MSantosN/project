<?php 

$mail = $_POST['mail'];
$foto = $_POST['fotot'];
$user = $_POST['userNam'];
$pass = $_POST['passw'];
$sexo = $_POST['sex'];
$id   = $_POST['idP'];
$queHagoConFoto = $_POST['queHacerConFoto'];

require_once("usuario.php");

	$titulo = "ALTA Usuario 2/2";
	$idPara=0;
	if(isset($_POST['idParaModificar'])) /*viene de la grilla*/
	{
		$idPara = $_POST['idParaModificar'];
		$unaPersona = usuario::TraerUnUsuario($_POST['idParaModificar']);
		$titulo = "MODIFICACIÓN Usuario 2/2";
	} 
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
<form id="FormIngreso" method="post" class="form-ingreso" action="formAlta.php" style="margin-left:150px;" enctype="multipart/form-data" onLoad="Blockear(); return false">
		<h3 class="form-ingreso-heading" style="    font-size: xx-large; font-family: sans-serif"> <?php echo $titulo; ?> </h3>
	<fieldset>	
		<h4> Es usted de Argentina? </h4>
		 <input type="radio" name="Argentino" id="Argentino" value="Si" onClick="Liberar()"> Si   
  				  
  		 <input type="radio" name="Argentino" id="Extranjero" value="No" onClick="Blockear()"> No
		<br><br>
  		 <input type="text" class="form-control" id="Prov" list="Provincias" placeholder="Escriba su provincia..."  disabled onblur="HabilitarLoc();return false"/>
<datalist id="Provincias" class="">
	<?php
	foreach ($provinciass as  $provincias) 
	{
		echo "<option>" . $provincias->provincia . "</option>";
	}
		
	?>
</datalist>

 <input type="text" class="form-control" id="Loc" placeholder="Escriba su Localidad..." disabled/>
 <input type="text" class="form-control" id="Dire" placeholder="Escriba su Direccion..." disabled/>
	
			<h4>Contacto</h4> 
            
                    <input type="checkbox" class="form-control" id="telefonocelular" onclick="HabilitarPorCheckbox('telefonocelular','tcelular')"> Teléfono celular: </input> 
                    <input type="text"  style= "width: 150px; height: 20px;"id="tcelular" value="" disabled placeholder= "Telefono Celular..." required=""> </input> </br>
                    <input type="checkbox" class="form-control" id="telefonofijo" onclick="HabilitarPorCheckbox('telefonofijo','telfijo')"> Teléfono fijo: <span>  </span>   </input> 
                    <input type="text" style ="width: 150px; height: 20px;margin-left: 17px; ; "id="telfijo" placeholder="Telefono fijo..." value="" disabled > </input> </br>
         
            <h4> Tipo de Usuario </h4>
            <input type="radio" name="tipoUsuario" class="" id="userComun" value ="Normal" > Normal </input> <br>
             <input type="radio"name="tipoUsuario" class="" id="userAdmin" value = "Administrador"> Administrador</input> 

		<a class="btn-info form-control" style="text-align:center;" name="guardar" onclick="GuardarUsuario();return false" > <span class="glyphicon glyphicon-floppy-save">&nbsp;</span> Guardar</a>
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