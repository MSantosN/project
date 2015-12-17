function VerEnMapa(dire, loc, prov, id, nombre)
{
	
	if (prov != "" &&
		dire != "" &&
		loc  != "")
	{
    
    var punto = dire +", " +  loc  +", " +  prov +", Argentina";

    console.log(punto);
    var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"VerEnMapa"
		}
	});
    funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
        $("#punto").val(punto);
        $("#id").val(id);
        $("#nombreUsuario").val(nombre);
	Geolocalizacion.Marcador.iniciar();
	Geolocalizacion.Marcador.verMarcador();	
	});
	}else{
		alert("Por favor, ingrese una dirección válida");
	};
}

function VerTiendas(dire, loc, prov, id, nombre)
{
	
	if (prov != "" &&
		dire != "" &&
		loc  != "")
	{
    
    var punto = dire +", " +  loc  +", " +  prov +", Argentina";

    console.log(punto);
    var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"VerTiendas"
		}
	});
    funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
        $("#punto").val(punto);
        $("#id").val(id);
        $("#nombreUsuario").val(nombre);
	Geolocalizacion.Marcador.iniciar();
	Geolocalizacion.Marcador.verMarcador();	
	});
	}else{
		alert("Por favor, ingrese una dirección válida");
	};
}
