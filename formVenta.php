<script type="text/javascript">
 function HabilitarUno(idSelect,cantidadText,precioText,totalText)
   {  
  
      document.getElementById(cantidadText).disabled=false;
      document.getElementById(cantidadText).value = null;
      LlenarPrecioTotal(idSelect,cantidadText,precioText,totalText);
      LlenarTotalCompra(document.getElementById(totalText).value);
      Escribir(idSelect);
   }

   function LlenarPrecioTotal(idSelect,cantidadText,precioText,totalText)
    {               
        var funcionAjax=$.ajax({
            url:"nexo.php",
            type:"post",
            data:{ queHacer:"TraerPrecio",
                   idpizza:document.getElementById(idSelect).value,
                 }
            });
        
        funcionAjax.done(function(retorno)
            { 
              //alert(retorno);              
              document.getElementById(precioText).value = retorno;
              document.getElementById(totalText).value = retorno * document.getElementById(cantidadText).value;
              LlenarTotalCompra(document.getElementById('total').value,document.getElementById('total2').value,document.getElementById('total3').value,document.getElementById('total4').value);
            });
        funcionAjax.fail(function(retorno)
            {
              alert(retorno); 
            });
        funcionAjax.always(function(retorno)
            {  
             //alert(retorno);   
            });        
    }

function Mostrar(idControl1,idControl2,idControl3,idControl4,idControl5)
{
 
 document.getElementById(idControl1).style.display = "inline";
  document.getElementById(idControl2).style.display = "inline";
  document.getElementById(idControl3).style.display = "inline";
  document.getElementById(idControl4).style.display = "inline";
  document.getElementById(idControl5).style.display = "inline";

}
function MostrarUltimo(idControl1,idControl2,idControl3,idControl4)
{
  document.getElementById(idControl1).style.display = "inline";
  document.getElementById(idControl2).style.display = "inline";
  document.getElementById(idControl3).style.display = "inline";
  document.getElementById(idControl4).style.display = "inline";
}
function LlenarTotalCompra(valor1,valor2,valor3,valor4)
{
  //          IMPORTANTE
  //PARA CAMBIAR UN VALUE EN JS NECESARIAMENTE TENGO Q USAR EL ID CON '' O TRAERLO COMO PARAMETRO
  //alert(valor);

document.getElementById('totalCompra').value = Number(valor1) + Number(valor2) + Number(valor3) + Number(valor4);
}

</script> 
 
<?php 
require_once("AccesoDatos.php");
require_once("pizza.php");
require_once("usuario.php");
require_once("validadora.php");
require_once("provincias.php");

$provinciass = provincias::TraerProvincias();
$arrayDepizzas= pizza::TraerTodasLasPizzas();
$usuario= usuario::TraerUnUsuarioPorNombre($_SESSION['logueado']);
if((isset($_SESSION['logueado'])) && (validadora::validarSesionActual())){  ?>
    <div class="container">

      <form  class="form-ingreso-ccw" onsubmit="GuardarVenta();return false;" style="width:450px;margin-left:150px;  ">
        <img src="venta.png" style="width:150px;height:90px;margin-bottom:10px;"></img>
        
        <select id="pizza" required="" name="pizza" style="width:81%;font-size:medium; background: rgba(0,0,0,0.5);color:#fff; text-shadow:0 1px 0 rgba(0,0,0,0.4);" class="" onchange="HabilitarUno('pizza','cantidad','precio','total')">  
          <option value="" disabled selected >Seleccionar producto</option> 
          <?php foreach ($arrayDepizzas as $pizza) 
                {            
                  echo "<option id='seleccion' value=$pizza->idPizza>$pizza->nombre ($$pizza->precio)</option>";                    
                }?>
        </select> <input type="button" id="mstrar" value="+" onClick="Mostrar('pizza2','Mostrar2','cantidad2','precio2','total2')" style="width:60px;height:30px;font-weight:600;"/>

        <br>
        <input type="number" id="cantidad" min="1" max="10" 
               placeholder="Cantidad" required="" disabled style="width:140px;height:30px;font-size:large;font-weight:800;text-align:center;" oninput="LlenarPrecioTotal('pizza','cantidad','precio','total')"/>
        <input type="number" disabled readonly id="precio" placeholder="Precio/Unidad" style="text-align:center;width:140px;height:30px;font-size:medium;font-weight:800" value=""/>
        <input type="number" disabled readonly id="total"  placeholder="Total" style="text-align:center;width:140px;height:30px;font-size:large;font-weight:800" value=""/ >
        <!-- Form 1-->
    
      </br>
      <select id="pizza2" name="pizza" style="display:none;width:81%;font-size:medium;background: rgba(0,0,0,0.5);color:#fff; text-shadow:0 1px 0 rgba(0,0,0,0.4);" class="" onchange="HabilitarUno('pizza2','cantidad2','precio2','total2')">  
          <option value="" disabled selected >Seleccionar producto</option> 
          <?php foreach ($arrayDepizzas as $pizza) 
                {            
                  echo "<option id='seleccion2' value=$pizza->idPizza>$pizza->nombre ($$pizza->precio)</option>";                    
                }?>
        </select> <input type="button" id="Mostrar2" value="+" onclick="Mostrar('pizza3','Mostrar3','cantidad3','precio3','total3')" style="display:none;width:60px;height:30px;font-weight:600;"/>

        <br>
        <input type="number" id="cantidad2" min="1" max="10" 
               placeholder="Cantidad" required="" disabled style="display:none;text-align:center;width:140px;height:30px;font-size:large;font-weight:800;" oninput="LlenarPrecioTotal('pizza2','cantidad2','precio2','total2')"/>
        <input type="number" disabled readonly id="precio2" placeholder="Precio/Unidad" style="display:none;text-align:center;width:140px;height:30px;font-size:medium;font-weight:800" value=""/>
        <input type="number" disabled readonly id="total2"  placeholder="Total" style="display:none;text-align:center;width:140px;height:30px;font-size:large;font-weight:800" value=""/ >
     
        <!-- Form 2--> 

  <select id="pizza3"  name="pizza" style="display:none;width:81%;font-size:medium;background: rgba(0,0,0,0.5);color:#fff; text-shadow:0 1px 0 rgba(0,0,0,0.4);" class="" onchange="HabilitarUno('pizza3','cantidad3','precio3','total3')">  
          <option value="" disabled selected >Seleccionar producto</option> 
          <?php foreach ($arrayDepizzas as $pizza) 
                {            
                  echo "<option id='seleccion3' value=$pizza->idPizza>$pizza->nombre ($$pizza->precio)</option>";                    
                }?>
        </select> <input type="button" value="+" id="Mostrar3" onclick="MostrarUltimo('pizza4','cantidad4','precio4','total4')" style="display:none;width:60px;height:30px;font-weight:600;"/>

        <br>
        <input type="number" id="cantidad3" min="1" max="10" 
               placeholder="Cantidad" required="" disabled style="display:none;text-align:center;width:140px;height:30px;font-size:large;font-weight:800;" oninput="LlenarPrecioTotal('pizza3','cantidad3','precio3','total3')"/>
        <input type="number" disabled readonly id="precio3" placeholder="Precio/Unidad" style="display:none;text-align:center;width:140px;height:30px;font-size:medium;font-weight:800" value=""/>
        <input type="number" disabled readonly id="total3"  placeholder="Total" style="display:none;text-align:center;width:140px;height:30px;font-size:large;font-weight:800" value=""/ >
     
        <!-- Form 3--> 

          <select id="pizza4"  name="pizza" style="display:none;width:95%;font-size:medium;background: rgba(0,0,0,0.5);color:#fff; text-shadow:0 1px 0 rgba(0,0,0,0.4);" class="" onchange="HabilitarUno('pizza4','cantidad4','precio4','total4')">  
          <option value="" disabled selected >Seleccionar producto</option> 
          <?php foreach ($arrayDepizzas as $pizza) 
                {            
                  echo "<option id='seleccion4' value=$pizza->idPizza>$pizza->nombre ($$pizza->precio)</option>";                    
                }?>
        </select>

        <br>
        <input type="number" id="cantidad4" min="1" max="10" 
               placeholder="Cantidad" required="" disabled style="display:none;text-align:center;width:140px;height:30px;font-size:large;font-weight:800;" oninput="LlenarPrecioTotal('pizza4','cantidad4','precio4','total4')"/>
        <input type="number" disabled readonly id="precio4" placeholder="Precio/Unidad" style="display:none;text-align:center;width:140px;height:30px;font-size:medium;font-weight:800" value=""/>
        <input type="number" disabled readonly id="total4"  placeholder="Total" style="display:none;text-align:center;width:140px;height:30px;font-size:large;font-weight:800" value=""/ >
            <h5><label>
              <!-- Form 4-->

                 Método de pago:
<!--             <input type="radio" Name="formaspago" id="formaspago" value="Transferencia o depósito" required="">Transferencia o depósito
             <input type="radio" Name="formaspago" id="formaspago" value="Otra forma de pago" required="">Otra forma de pago-->
             <br>
             <input type="radio" style="height:15px; margin-left:10px;" Name="formaspago" id="transferencia" value="Transferencia o depósito" required="">Transferenca o depósito
             <br>
             <input type="radio" style="height:15px;margin-left:10px;" Name="formaspago" id="otra" value="Otra forma de pago" required="">Otra forma de pago
            </label>
            </h5>

      <h5 style="font-weight:600">  Vendedor: <input type="text" disabled readonly id="vendedor" style="width:150px;border:none;font-weight:800;color:blue;" value="<?php echo $_SESSION['logueado']?>">
        <input type="hidden" id="idVendor" value="<?php echo($usuario->id)?>"
        </h5></br>
        <h4> Total por la compra: <input type="number" id="totalCompra" readonly disabled style="width:100px;height:40px;background-color:black;color:white;text-align:center;"  value="0" />
       </h4>
         <input type="text" class="form-control" id="Prov" list="Provincias" placeholder="Escriba su provincia..."  onblur="HabilitarLoc();return false"value="<?php if(isset($pro)) {echo ($pro);} ?>"/>
<datalist id="Provincias" class="">
  <?php
  foreach ($provinciass as  $provincias) 
  {
    echo "<option>" . $provincias->provincia . "</option>";
  }
  ?>
</datalist>

 <input type="text" class="form-control" id="Loc" placeholder="Escriba su Localidad..."  value="<?php if(isset($loca)) {echo ($loca);} ?>"/>
 <input type="text" class="form-control" id="Dire" placeholder="Escriba su Direccion..."  value="<?php if(isset($direcc)) {echo ($direcc);} ?>" />
       </br>
        <button class="btn btn-lg btn-primary btn-block" style="margin-bottom:20px;" type="submit">Guardar</button>
        <input type="hidden" name="id" id="idVenta" readonly>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  
