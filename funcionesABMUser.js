function GuardarUsuario()
{	
        var id = $("#idOc").val()
		var nombre=$("#userOc").val();
		var pass=$("#passOc").val();
        var sexo=$("#sexoOc").val();
        var foto=$("#fotoOc").val();  
        var mail = $("#mailOc").val();
        var accionFoto = $("#accionFoto").val();
  			
        if ($("#Argentino").is(':checked')) 
        	{
        		var provincia = $("#Prov").val();
        		var localidad = $("#Loc").val();
        		var direccion = $("#Dire").val();
        	} else
        	{
        		var direccion = "Este usuario no es ubicable";	
        	}	
        if ($("#telefonocelular").is(':checked'))
         {
         	var telefonocelular = $("#tcelular").val();
         }
        if ($("#telefonofijo").is(':checked'))
         {
         	var telefonofijo = $("telfijo").val();
         }
        var tipo = $('input:radio[name=tipoUsuario]:checked').val();

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
				queHacer:"GuardarUser",
				id:id,
				nombre:nombre,
				pass:pass,
	            sexo:sexo,
	            mail:mail,
	            foto:foto,
	            queHacerConLaFoto:accionFoto,
	            provincia:provincia,
	            localidad:localidad,
	            direccion:direccion,
	            telefonofijo:telefonofijo,
	            telefonocelular:telefonocelular,
	            tipo:tipo
	           
			 }
	});
	funcionAjax.done(function(retorno){			
		
		MostrarGrillaUser();						
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);		
	});	
	funcionAjax.always(function(retorno){	
		//alert(retorno);		
	});	

}
function BorrarUsuario(idParametro)
{	
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Borraruser",
			id:idParametro	
		}
	});

	funcionAjax.done(function(retorno){
		MostrarGrillaUser();		
	});

}

function EditarUsuario(idParametro)
{
	alert("Modificar");
	/*
	 MostrarAltaUser();	
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerUsuario",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){		
		var usuario = JSON.parse(retorno);		
		$("#id").val(usuario.id);
		$("#nombreUsuario").val(usuario.nombreUsuario);
        $("#pass").val(usuario.pass);
        $("#mail").val(usuario.mail);
        //$("#fichero").attr('name',usuario.foto); 
        $("#mail").val(usuario.mail);
        $("#mail").val(usuario.mail);
        $("#mail").val(usuario.mail);

        $("#imagen").attr('src','Fotos/'+usuario.foto);        
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
	});
	*/
}
