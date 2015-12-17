<?php 

	require_once("AccesoDatos.php");
	require_once("pizza.php");
	$arrayDepizzas= pizza::TraerTodasLasPizzas();
 ?>

 <table class="table"  border="4" style="background-color: #FEC500;border-color: black; align-content: center;width:600px;margin-left:150px; ">
	<thead>
		<tr>		 
			<th><h4 style="text-align:center;">Descripcion</h4></th>
			<th><h4 style="text-align:center;">Ingredientes</h4></th>
			<th><h4 style="text-align:center;">Precio</h4></th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDepizzas as $pizza) 
{
	echo"<tr>
			<td style='font-size:medium;text-align:center;'>$pizza->nombre</td>
			<td>$pizza->ingredientes</td>
			<td style='font-size:x-small;'>$pizza->precio</td>
		</tr>   ";
}
		 ?>
	</tbody>
</table>
<strong style="color:blue;margin-left:150px; "> <p > <h3>Esperamos que nuestras pizzas sean de tu agrado. 
 Recuerda que puedes  </strong></h3>
<strong style="color:blue;margin-left:150px; "> <p > <h3> 
 dejar sugerencias:</strong></h3>
  <button class="btn" style="background-color:grey;width:100px;height:50px;text-align:center;margin-left:150px;" onclick="Sugerir();return false"> <h4    font-weight: bolder;> Sugerencias</h4> </button> </p>