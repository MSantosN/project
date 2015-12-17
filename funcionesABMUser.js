function GuardarUsuario()
{	
        var id = $("#idOc").val();
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
        		var provincia = "";
        		var localidad = "";
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
				idP:id,
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
		$("#userName").val(usuario.nombreUsuario);
		$("#email").val(usuario.mail);
        $("#password").val(usuario.pass);
        //$("#fichero").attr('name',usuario.foto); 
        
        if (usuario.direccion != "Este usuario no es ubicable") 
        	{
        		$("#argOc").val(true);
        		$("#direccionOc").val(usuario.direccion);
        		$("#localidadOc").val(usuario.localidad);
        		$("#provOc").val(usuario.provincia);
        	}
        	else{
        		$("#argOc").value = "";
        		 $("#direccionOc").val(usuario.direccion);
        		 $("#localidadOc").value = "";
        		 $("#provOc").value = "";
        	}

        if (usuario.telefonofijo != null) 
        {
        	$("#telfijoOc").val(usuario.telefonofijo);
        }
        if (usuario.telefonocelular != null )
        	{
        		$("#telcelOc").val(usuario.telefonocelular);
        	}
        $("#tipoOc").val(usuario.tipo);	
        
        $("#imagen").attr('src','Fotos/'+usuario.foto);        
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
	});
	
}
