/* Validacion de e-mail(inicio) */
function validarEmailorg(idCampo) {
	
if(idCampo == 'organigrama_correo1'){
var organigrama_correo1Esc = document.getElementById('organigrama_correo1').value;
var organigrama_correo1Esc_campo = document.getElementById('organigrama_correo1');

var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

  if (emailRegex.test(organigrama_correo1)){
   //alert("La direcci�n de email " + correo_electronico_admEsc + " es correcta.");
  //emailOK.innerText = "correcto";
	errorganigrama_correo1As.className = 'form-text';
	document.getElementById('emailOK_org').innerText="";
	organigrama_correo1Esc_campo.className = 'form-control' ;
  }else{
  	
  	document.getElementById('emailOK_org').className = 'form-text form-text-error';
  	Correo_electronico_dirEsc_campo.value="";
  	document.getElementById('emailOK_org').innerText="La direcci\u00F3n de email " + organigrama_correo1Esc + " es incorrecta";
	
	//alert("La direcci�n de email es incorrecta.");
  	errCorreo_electronico_dirAs.className = 'form-text form-text-error';
  	// esc_arreglo.className = 'form-control form-control-error'; 
  	Correo_electronico_dirEsc_campo.className = 'form-control form-control-error' ;

  	var http_request = false;
  	var nombre = 'organigrama_correo1';
		var valor = document.getElementById('organigrama_correo1').value;

		console.log(nombre);
		console.log(valor);
	  var url_instancia='receptor2_Proyecto_organigrama.php?variable='+nombre+'&valor='+valor;
		hacerPeticion(url_instancia);			
  	}
  }
}
/* Validacion de e-mail(fin) */