function validarLogin()
{
		var varUsuario=$("#EmailLogin").val();
		var varClave=$("#PasswordLogin").val();
		var recordar=$("#Remember").is(':checked');	

	var funcionAjax=$.ajax({
		url:"validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave
		}
	});

	funcionAjax.done(function(retorno){
				if(retorno == "no esta en la base")
			{	
				$("#formLogin").addClass("animated bounceInLeft");
				MostrarErrorLogin();
				$("#formLogin").removeClass("animated bounceInLeft"); // se remueve la animacion para que despues se vuelva a poner
			}

			if (retorno== "Administrador")
			 {
			 	MostrarFormLogADM();

			 } 
			 if (retorno == "User")
			 {
			 	MostrarFormLog();
			 }	  
		
	});

	funcionAjax.fail(function(retorno){
		alert("fallo el login");
	});	

}


function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			MostrarLogin();
			window.location.href = "index.php";			
	});	
}
