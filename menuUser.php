<?php 
$x = 0;
	require_once("AccesoDatos.php");
	require_once("pizza.php");
	require_once("validadora.php");
	$arrayDepizzas= pizza::TraerTodasLasPizzas();
if( (isset($_SESSION['logueado'])) && (validadora::validarSesionActual()))
	{ 
 ?>

 <table class="table"  border="4" style="background-color: #FEC500;border-color: black; align-content: center;width:600px;margin-left:150px; ">
	<thead>
		<tr>		 
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
			<td style='font-size: medium;' align='center'>$pizza->nombre</td>
			<td style='font-size: small;' align='center'>$pizza->ingredientes</td>
			<td style='font-size: medium; font-weight:700;' align='center'>$pizza->precio</td>
		</tr>   ";
		$x= $x+1;
}
echo "
<input type='hidden' id='idPedidos' value='$pizza->idPizza'> </input> 
<input type='hidden' id='cantidadDePedidos' value='$x'> </input> 
</tbody>
</table>";
echo "<input type='button' style='height:40px;width:150px;margin-left: 350px;margin-top:-100px;font-size: medium;font-family: sant-serif;font-weight:700;background-color: limegreen;' class='btn-success' value='Generar Compra' onclick='Comprar();return false'> </input>";

}else 
	{ 
      echo"<h3>usted no esta logeado o su session ya expiro. </h3>"; 
	} ?>
	
	