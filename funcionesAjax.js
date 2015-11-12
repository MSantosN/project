function irAMenu()
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Menu"
		}
	});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});

}

function MostrarErrorLogin()
{
var funcionAjax = $.ajax({
url:"nexo.php",
type:"post",
data:{
	queHacer:"MostrarErrorlog"
	}
	});
funcionAjax.done(function(retorno){
	$("#errorLogin").html(retorno);
	$("#formLogin").addClass("animated bounceInLeft");
});
}


function MostrarFormLog()
{
var funcionAjax = $.ajax({
url:"nexo.php",
type:"post",
data:{
	queHacer:"MostrarFormlogueado"
	}
	});
funcionAjax.done(function(retorno){
	$("#formLogin").html(retorno);
});

}

function MostrarLogin()
{
var funcionAjax = $.ajax({
url:"nexo.php",
type:"post",
data:{
	queHacer:"Mostrarlogin"
	}
	});
funcionAjax.done(function(retorno){
	$("#formLogin").html(retorno);
});

}

function MostrarFormLogADM()
{
	var funcionAjax = $.ajax({
url:"nexo.php",
type:"post",
data:{
	queHacer:"MostrarLogADM"
	}
	});
funcionAjax.done(function(retorno){
	$("#formLogin").html(retorno);
});
}

function Sugerir()
{

var funcionAjax = $.ajax({
	url:"nexo.php",
	type:"post",
	data:{
			queHacer:"email"
		}
		});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});

}

function MostrarAltaPizzas()
{
	var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"MostrarAltaPizza"
		}

	});
funcionAjax.done(function(retorno){
	$("#principal").html(retorno);
});
}


function MostrarAltaUser()
{
	var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"MostrarAltauser"
		}

	});
funcionAjax.done(function(retorno){
	$("#principal").html(retorno);
});
}