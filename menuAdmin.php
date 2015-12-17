<?php 
	require_once("AccesoDatos.php");
	require_once("pizza.php");
	require_once("validadora.php");
	$arrayDepizzas= pizza::TraerTodasLasPizzas();
if( (isset($_SESSION['logueado'])) && (validadora::validarSesionActual()))
	{  ?>
 

 <table class="table"  border="4" style="background-color: #FEC500;border-color: black;width:600px;margin-left:150px; ">
	<thead>
		<tr>
			<th><h4 align="center">Editar</h4></th>
			<th><h4 align="center">Borrar</h4></th>		 
			<th><h4 align="center">Descripcion</h4></th>
			<th><h4 align="center">Ingredientes</h4></th>
			<th><h4 align="center">Precio</h4></th>
			
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDepizzas as $pizza) 
{
	echo"<tr>
			<td><a onclick='EditarPizza($pizza->idPizza); return false' style='background-color: blue;' class='btn btn-warning'> Editar</a></td>
			<td><a onclick='BorrarPizza($pizza->idPizza); return false' style='background-color: red;'class='btn btn-danger'>  Borrar</a></td>
			<td style='font-size: medium;' align='center'>$pizza->nombre</td>
			<td style='font-size: x-small;' align='center'>$pizza->ingredientes</td>
			<td style='font-size: medium; font-weight:700;' align='center'>$pizza->precio</td>
			
		</tr>   ";

}echo "
</tbody>
</table>
";

echo "<div>
<input type='button' style='height:40px;width:150px;margin-left: 350px;margin-top:1px;margin-top:4px;margin-bottom:4px;font-size: medium;font-family: sant-serif;font-weight:700;background-color: limegreen;' class='btn-success' value='Generar Compra' onclick='Comprar();return false'> </input>
</div>";
}else 
	{ 
      echo"<h3>usted no esta logeado o su session ya expiro. </h3>"; 
	} 
?>