function BorrarPizza(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Borrarpizza",
			id:idParametro	
		}
	});

	funcionAjax.done(function(retorno){
		irAMenu();		
	});
	
}

function EditarPizza(idParametro)
{
	MostrarAltaPizzas();
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerPizza",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		
		var pizza =JSON.parse(retorno);	
		
		$("#idPizza").val(pizza.idPizza);
		$("#nombrePizza").val(pizza.nombre);
		$("#precio").val(pizza.precio);
		$("#ingredientes").val(pizza.ingredientes);
		
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);	
	});	
	
}

function GuardarPizza()
{	
		var idP=$("#idPizza").val();
		var nombrePizza=$("#nombrePizza").val();
		var precio=$("#precio").val();
		var ingredientes=$("#ingredientes").val();

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Guardarpizza",
			id:idP,
			nombrePizza:nombrePizza,
			precio:precio,
			ingredientes:ingredientes	
		}
	});
	funcionAjax.done(function(retorno){
			irAMenu();
		$("#informe").html("cantidad de agregados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}
