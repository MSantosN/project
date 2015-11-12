
<?php 
require_once("pizza.php");
if($_SESSION['tipo']=="Administrador")
{
/*
$title = "Nueva Pizza";
$idParametro= 0;
if (isset($_POST['idModificar'])) 
  {

  $idParametro =$_POST['idModificar'];
  $miPizza= pizza::TraerUnaPizza($idParametro);
  $title = "Modificar una pizza";

  } 
*/
  ?>


    <div class="container">

      <form id="formIngreso" class="form-ingreso" onsubmit="GuardarPizza();return false">
        <h2 class="form-ingreso-heading">Pizza</h2>
        <label for="nombrePizza" class="sr-only">Nombre</label>
        <input type="text"  minlength="6"  id="nombrePizza" title="Se necesita un nombre de pizza" style="width:338px;"  class="form-control" placeholder="Nombre" required="" autofocus="" value="<?php echo isset($miPizza) ?  $miPizza->nombre : "" ; ?>">
        <label for="precio" class="sr-only">Precio</label>
        <input type="text"  minlength="3"  id="precio" title="Se necesita un precio razonable para la pizza"  style="width:338px;" class="form-control" placeholder="Precio" required="" autofocus="" value="<?php echo isset($miPizza) ?  $miPizza->precio : "" ; ?>">
        <textarea  class="form-control" style=" margin-left: -10; margin-right: ‒40;  margin-left: 0px;" title="Ingredientes deseados"  id="ingredientes"  rows="5"  placeholder="Ingredientes..."  autofocus="" value="<?php echo isset($miPizza) ?  $miPizza->ingredientes : "" ; ?>"></textarea>
        <input readonly   type="hidden"    id="idPizza" class="form-control" >
       
        <button  class="btn  btn-success form-control" style="width:338px;background-color:green;"  type="submit">Guardar <span class="glyphicon glyphicon-ok-sign"></span></button>
     
      </form>

    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no tiene permiso para acceder aqui. </h3>";} ?>         
   
   
<?php 
