<?php 
	
	require_once("AccesoDatos.php");
	require_once("usuario.php");	
	$arrayDeUsuarios=usuario::TraerTodosLosUsuarios();
	if(isset($_SESSION['logueado'] && validadora::validarSesionActual())){  ?>


		<table class="table"  style=" background-color: beige;width: 800px; border:3;margin-top:10px">
			<thead>
				<tr>
					<th><h6>Editar</h6></th>
					<th><h6>Borrar</h6></th>
					<th><h6>Ubicar</h6></th>
					<th><h6>NombreUsuario</h6></th>
					<th><h6>Email</h6></th>
					<th><h6>Direccion</h6></th>
					<th><h6>Sexo</h6></th>
					<th><h6>Tipo</h6></th>
					<th><h6>Foto</h6></th>
				</tr>
			</thead>
			<tbody>
    	<?php 
		foreach ($arrayDeUsuarios as $usuario) 
			{    
				$loc = '"' . $usuario->direccion . '", "' . $usuario->localidad . '", "' . $usuario->provincia .'"';
				$l = $usuario->direccion .  ', ' . $usuario->localidad .  ', ' . $usuario->provincia . '';
				echo"<tr>
						<td><button style='width:40px;height:30px; background-color:orange'onclick='EditarUsuario($usuario->id)' class=''> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</button></td>
						<td><button style='width:40px;height:30px; background-color:red'onclick='BorrarUsuario($usuario->id)' class=''>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</button></td>
						<td><button style='width:40px;height:30px;'onclick='VerEnMapa($loc)' class='btn-info'>   <span class='glyphicon glyphicon-map-marker'>&nbsp;</span>Ver      Mapa</button></td>
						<td>$usuario->nombreUsuario</td>
            		    <td>$usuario->mail</td>
            			<td>$l</td>
            			<td>$usuario->sexo</td>
            			<td>$usuario->tipo</td>
            			<td><img  class='fotoGrilla' style='width:70px;height:70px;' src='Fotos/".$usuario->foto."' /></td>			
					</tr>";
			}			  
		}
	else 
	{ 
      echo"<h3>usted no esta logeado o su session ya expiro. </h3>"; 
	} ?>
	</tbody>
</table>
