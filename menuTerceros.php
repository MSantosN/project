<?php 

	require_once("AccesoDatos.php");
	require_once("pizza.php");
	$arrayDepizzas= pizza::TraerTodasLasPizzas();
 ?>

 <table class="table"  border="4" style="background-color: #FEC500;border-color: black; align-content: center;">
	<thead>
		<tr>		 
			<th><h4>Descripcion</h4></th>
			<th><h4>Ingredientes</h4></th>
			<th><h4>Precio</h4></th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDepizzas as $pizza) 
{
	echo"<tr>
			<td><h5>$pizza->nombre</h5></td>
			<td>$pizza->ingredientes</td>
			<td>$pizza->precio</td>
		</tr>   ";
}
		 ?>
	</tbody>
</table>
<strong style="color:blue; "> <p > <h3>Esperamos que nuestras pizzas sean de tu agrado. 
 Recuerda que puedes dejar sugerencias:</strong></h3>
  <button class="btn" style="background-color:grey;width:100px;height:50px;text-align:center;" onclick="Sugerir();return false"> <h5> Sugerencias</h5> </button> </p> 
