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

function About()
{
	var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"MostrarAbout"
		}

	});
funcionAjax.done(function(retorno){
	$("#principal").html(retorno);
});
}

function ContinuarRegistro()
{
	var foto = $("#imagen").attr('src');  
	var userName = $("#userName").val();
	var pass = $("#password").val();
	var email = $("#email").val();
	var sexo = $('input:radio[name=sex]:checked').val();
	var id = $("#id").val();
	var files = $("#fichero").get(0).files;

        if (files[0] != null)
        	{
        		foto = files[0].name;
        		var accionFoto = 'nueva';
            }
        else
            {
            	foto = foto.replace("Fotos/", "");
            	if (foto == "")
            	 {
            		var accionFoto = 'noesta';		
            	 }
            	else
            	 {
            	 	var accionFoto = 'existe';
            	 } 	
            }    	

            if ($("#direccionOc").val() != null ) 
            	{
            		var args = $("#argOc").val();
            		var direcc = $("#direccionOc").val();
            		var loca = $("#localidadOc").val() ;
            		var pro = $("#provOc").val();
            		var telfij = $("#telfijoOc").val();
            		var telce = $("#telcel").val();
            		var tip = $("#tipoOc").val();
            	var funcionAjax = $.ajax({
					url:"nexo.php",
					type:"post",
					data:{
			queHacer:"Alta2",
			queHacerConFoto:accionFoto,
			fotot:foto,  
			userNam:userName,
			mail:email,
			passw:pass,
			sex:sexo,
    		arg:args,
            direc:direcc,
            loc:loca,
            prov:pro,
            telfijo:telfij,
            telcel:telce,
            tipo:tip,

           	idP:id	}
            	});
            }else{
            	var funcionAjax = $.ajax({
					url:"nexo.php",
					type:"post",
					 data:{
			queHacer:"Alta2",
			queHacerConFoto:accionFoto,
			fotot:foto,  
			userNam:userName,
			mail:email,
			passw:pass,
			sex:sexo,
			idP:id
            	}
            	});
            }		


funcionAjax.done(function(retorno){
	$("#principal").html(retorno);
	});
}
function cargarFoto(){
    var files = $("#fichero").get(0).files; // $("#fichero") slector por id de jquery  
    //var envio = new FormData();
    //var envio = new FormData($("#formProducto")[0]);
    var envio = new FormData();
    for (var i = 0; i < files.length; i++) {
    envio.append("fichero0", files[i]);
    }
    var promise = $.ajax
            ({
            type: "POST",
            url: "ajaxFoto.php",
            contentType: false,
    		processData: false,
            data: envio,
            cache: false,
            dataType: "text"
          });// fin del ajax
            
    // la funcion Ajax me devuelve una promesa de javascript, algo que va a hacerse. Cuando el servidor responde y si la respuesta del servidor es exitosa ingresa al done y ejecuta la función que se le pasa
    promise.done(function (dato){ 
                    //alert(dato);
                    $('#error').hide();
                    console.log(dato);
                    var strIndex = dato.indexOf('Error');
                    if(strIndex == -1) {
                        //string no encontrado
                        $('#imagen').attr("src", "FotosTemp/" + files[0].name);
                         $('#error').html("");
                    } else {
                        //string encontrado
                        $('#error').html(dato);
                        $('#error').show();
                        $('#imagen').attr("src", "");
                        $('#fichero').val("");
                    }
                       
    });

}
function MostrarGrillaUser()
{
	var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"MostrarGrillaUsuario"
		}

	});
funcionAjax.done(function(retorno){
	$("#principal").html(retorno);
});
}

function Privacidad()
{

var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Privacidad"
		}

	});
funcionAjax.done(function(retorno){
	$("#principal").html(retorno);
});

}

function Comprar()
{
	var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Venta"
		}

	});
funcionAjax.done(function(retorno){
	$("#principal").html(retorno);
});

}

function ContactarAdmins()
{
var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"ContactoAdmin"
		}

	});
funcionAjax.done(function(retorno){
	$("#principal").html(retorno);
});


}

function irAOfertas()
{
var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Ofertas"
		}
	});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});
}

function MostrarTiendas()
{
		VerTiendas("Beauchef 268", "Caballito", "Buenos Aires", 2, "Caballito");
	VerTiendas("La Plata 42", "La Falda", "Cordoba", 3, "La Falda");
	VerTiendas("Bynnon 2478", "Jose Marmol", "Buenos Aires",1, "Casa Central");


}