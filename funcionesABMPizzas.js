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
		$("#nombre").val(pizza.nombre);
		$("#ingredientes").val(pizza.ingredientes);
		$("#precio").val(pizza.precio);
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);	
	});	
	MostrarAlta();
}

function GuardarPizza()
{
		var id=$("#idPizza").val();
		var nombrePizza=$("#nombrePizza").val();
		var precio=$("#precio").val();
		var ingredientes=$("#ingredientes").val();

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Guardarpizza",
			id:id,
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
