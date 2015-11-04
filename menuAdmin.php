<?php 

	require_once("AccesoDatos.php");
	require_once("pizza.php");
	$arrayDepizzas= pizza::TraerTodasLasPizzas();

 ?>

 <table class="table"  border="4" style="background-color: #FEC500;border-color: black; align-content: center;">
	<thead>
		<tr>
			<th><h4>Editar</h4></th>
			<th><h4>Borrar</h4></th>		 
			<th><h4>Descripcion</h4></th>
			<th><h4>Ingredientes</h4></th>
			<th><h4>Precio</h4></th>
			<th><h4>Cantidad</h4></th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDepizzas as $pizza) 
{
	echo"<tr>
			<td><a onclick='EditarPizza($pizza->idPizza); return false' class='btn btn-warning'> Editar</a></td>
			<td><a onclick='BorrarPizza($pizza->idPizza); return false' class='btn btn-danger'>  Borrar</a></td>
			<td><h5>$pizza->nombre</h5></td>
			<td>$pizza->ingredientes</td>
			<td>$pizza->precio</td>
			<td><input type='text' style='width: 30px;' /></td>
		</tr>   ";
}
		 ?>
	</tbody>
</table>