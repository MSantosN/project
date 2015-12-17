<?php 
	
	require_once("AccesoDatos.php");
	require_once("usuario.php");
	require_once("validadora.php");	
	$arrayDeUsuarios=usuario::TraerTodosLosUsuarios();
	if(isset($_SESSION['logueado'])){  ?>


		<table class="table-condensed"  style=" border: solid;background-color: navajowhite;width: 800px;margin-top:10px">
			<thead style="border:solid">
				<tr>
					<th style="border:solid;border-width:1px;"><h5 align="center" style="font-weight:bold;" >Ubicar</h5 ></th>
					<th style="border:solid;border-width:1px;"><h5 align="center" style="font-weight:bold;">NombreUsuario</h5 ></th>
					<th style="border:solid;border-width:1px;"><h5 align="center" style="font-weight:bold;" >Email</h5 ></th>
					<th style="border:solid;border-width:1px;"><h5 align="center" style="font-weight:bold;" >Direccion</h5 ></th>
					<th style="border:solid;border-width:1px;"><h5 align="center" style="font-weight:bold;" >Telefono celular</h5 ></th>
					<th style="border:solid;border-width:1px;"><h5 align="center" style="font-weight:bold;" >Telefono fijo</h5 ></th>
					<th style="border:solid;border-width:1px; width:70px;"><h5 align="center" style="font-weight:bold;" >Foto</h5 ></th>
				</tr>
			</thead>
			<tbody>
    	<?php 
		foreach ($arrayDeUsuarios as $usuario) 
			{    if ($usuario->tipo == "Administrador")
				{
				$loc = '"' . $usuario->direccion . '", "' . $usuario->localidad . '", "' . $usuario->provincia .'", "' .  $usuario->id  .'", "' . $usuario->nombreUsuario .  '"';
				$l = $usuario->direccion .  ', ' . $usuario->localidad .  ', ' . $usuario->provincia . '';
				echo"<tr>
						<td style='border:dotted; border-width:2px ;'><button class='btn-info' style='width:40px;height:30px;'onclick='VerEnMapa($loc)'>   <span class='glyphicon glyphicon-map-marker'>&nbsp;</span>Ver      Mapa</button></td>
						<td style='border:dotted; border-width:2px;font-size:initial;'>$usuario->nombreUsuario</td>
            		    <td style='border:dotted; border-width:2px;font-size:small;'>$usuario->mail</td>
  	          			<td style='border:dotted; border-width:2px ;'>$l</td>
  	          			<td style='border:dotted; border-width:2px ;'>$usuario->telefonocel</td>
  	          			<td style='border:dotted; border-width:2px ;'>$usuario->telefonofijo</td>	
            			<td style='border:dotted; border-width:2px ;'><img  class='fotoGrilla' style='width:70px;height:70px;' src='Fotos/".$usuario->foto."' /></td>			
					</tr>";
				}
			}			  
		}
	else 
	{ 
      echo"<h3>usted no esta logeado o su sesion ya expiro. </h3>"; 
	} ?>
	</tbody>
</table>
