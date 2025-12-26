/* Validacion de e-mail(inicio) */
function validarEmailorg(idCampo) {
	var organigrama_correoa = idCampo.value;
	console.log(organigrama_correoa);

//if(idCampo == 'organigrama_correoa'){
var organigrama_correoaEsc = idCampo.value;
var organigrama_correoaEsc_campo = idCampo.value;

var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

  if (emailRegex.test(organigrama_correoa)){
  alert("La direcci�n de email " + correo_electronico_admEsc + " es correcta.");
  emailOK.innerText = "correcto";
	/*errorganigrama_correoaAs.className = 'form-text';
	document.getElementById('emailOK_org').innerText="";
	organigrama_correoaEsc_campo.className = 'form-control' ;*/
  }else{
  	
  	document.getElementById('emailOK_org').className = 'form-text form-text-error';
  	organigrama_correo1Esc_campo.value="";
  	document.getElementById('emailOK_org').innerText="La direcci\u00F3n de email " + organigrama_correoaEsc + " es incorrecta";
	
	alert("La direcci�n de email es incorrecta.");
  	/*errorganigrama_correoaAs.className = 'form-text form-text-error';
  	// esc_arreglo.className = 'form-control form-control-error'; 
  	organigrama_correoaEsc_campo.className = 'form-control form-control-error' ;

  	var http_request = false;
  	var nombre = 'organigrama_correoa';
		var valor = document.getElementById('organigrama_correoa').value;

		console.log(nombre);
		console.log(valor);
	  var url_instancia='receptor2_Proyecto_organigrama.php?variable='+nombre+'&valor='+valor;
		hacerPeticion(url_instancia);	*/	
		}	
  	//}
}
/* Validacion de e-mail(fin) */