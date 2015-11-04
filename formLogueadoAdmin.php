<form id="formLogin" method="post" class="tpz_form_input" >
 <fieldset>
<legend>Bienvenido: <?php echo($_SESSION['logueado']); ?> </legend>

<div id="adds">
	<h4> Menu de opciones: </h4> 
<br>
<button style="width:200px;height:40px;" class="btn-info" onclick="deslogear();return false"> <h4> Desloguearme </h4> </button>
</br>
<br>
<button style="width:200px;height:40px;" class="btn-warning" onclick="MostrarAltaPizzas();return false"> <h4> Añadir pizza </h4> </button>
</br>

<br>
<button style="width:200px;height:40px;" class="btn-primary" onclick="MostrarAltaUser();return false"> <h4> Añadir usuario </h4> </button>
</br>


 </div>


</fieldset>
</form>
