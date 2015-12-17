function BorrarVenta(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarVenta",
			id:idParametro	
		}
	});

	funcionAjax.done(function(retorno){
		Ventas();		
	});
	
}

function EditarVenta(idParametro)
{
	Comprar();
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerVenta",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		
		var Venta =JSON.parse(retorno);	
		
		$("#idVenta").val(Venta.idVenta);
		$("#nombreVenta").val(Venta.nombre);
		$("#precio").val(Venta.precio);
		$("#ingredientes").val(Venta.ingredientes);
		
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);	
	});	
	
}

function GuardarVenta()
{	
		var idP=$("#idVenta").val();
		var formadepago=$('input:radio[name=formaspago]:checked').val();
		var fecha = new Date();
		var idVendor = $("#idVendor").val();
		var total=$("#totalCompra").val();
		var direccion=$("#Dire").val();
		var localidad=$("#Loc").val();
		var provincia=$("#Prov").val();

		
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Guardarventa",
			id:idP,
			formadepago:formadepago,
			fecha:fecha,
			idVendor:idVendor,
			total:total,
			direccion:direccion,
			localidad:localidad,
			provincia:provincia	
		}
	});
	funcionAjax.done(function(retorno){

			for (var i = 4; i >= 0; i--)
		 {
		 	if ($("#cantidadi").value >0)
		 	 {
		 		GuardarDetalle($("#pizzai").value,idP,$("#cantidadi").value)
		 	};
		 	

		 };
		 if ($("#cantidad").value >0)
		 	 {
		 		GuardarDetalle($("#pizza").value,idP,$("#cantidad").value)
		 	};
		
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	
}

function GuardarDetalle(idPizza,idVenta,cantidad)
{
	var pizza = idPizza;
	var venta = idVenta;
	var cant = cantidad;

var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Guardardetalle",
			idPizza:pizza,
			idVenta:venta,
			cantidad:cant				
		}
	});
	funcionAjax.done(function(retorno){
alert(retorno);
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	

}