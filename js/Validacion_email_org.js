/* Validacion de e-mail(inicio) */
function validarEmailorg(idCampo) {
	//console.log(idCampo);
	var organigrama_correoEsc = document.getElementById(idCampo).value;
	//console.log(organigrama_correoEsc);
	var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

  if (emailRegex.test(organigrama_correoEsc)){
  if(idCampo=="organigrama_correo1"){
		organigrama_correo1.className = 'form-control';
		document.getElementById('emailOK_1').className = 'form-text';
		document.getElementById('emailOK_1').innerText="";
	}

	if(idCampo=="organigrama_correo2"){
		organigrama_correo2.className = 'form-control';
		document.getElementById('emailOK_2').className = 'form-text';
		document.getElementById('emailOK_2').innerText="";
	}

	if(idCampo=="organigrama_correo3"){
		organigrama_correo3.className = 'form-control';
		document.getElementById('emailOK_3').className = 'form-text';
		document.getElementById('emailOK_3').innerText="";
	}

	if(idCampo=="organigrama_correo4"){
		organigrama_correo4.className = 'form-control';
		document.getElementById('emailOK_4').className = 'form-text';
		document.getElementById('emailOK_4').innerText="";
	}

	if(idCampo=="organigrama_correo5"){
		organigrama_correo5.className = 'form-control';
		document.getElementById('emailOK_5').className = 'form-text';
		document.getElementById('emailOK_5').innerText="";
	}

	if(idCampo=="organigrama_correo6"){
		organigrama_correo6.className = 'form-control';
		document.getElementById('emailOK_6').className = 'form-text';
		document.getElementById('emailOK_6').innerText="";
	}

	if(idCampo=="organigrama_correo7"){
		organigrama_correo7.className = 'form-control';
		document.getElementById('emailOK_7').className = 'form-text';
		document.getElementById('emailOK_7').innerText="";
	}

	if(idCampo=="organigrama_correo8"){
		organigrama_correo8.className = 'form-control';
		document.getElementById('emailOK_8').className = 'form-text';
		document.getElementById('emailOK_8').innerText="";
	}
  }else{
	//alert("correo incorrecto");
	var nom_completa_err = 'err'+idCampo+"As";
	//console.log(nom_completa_err);
			
	if(idCampo=="organigrama_correo1"){
		organigrama_correo1.className = 'form-control form-control-error';
		document.getElementById('emailOK_1').className = 'form-text form-text-error';
		organigrama_correo1.value="";
		document.getElementById('emailOK_1').innerText="La direcci\u00F3n de email " + organigrama_correoEsc + " es incorrecta";
	}

	if(idCampo=="organigrama_correo2"){
		organigrama_correo2.className = 'form-control form-control-error';
		document.getElementById('emailOK_2').className = 'form-text form-text-error';
		organigrama_correo2.value="";
		document.getElementById('emailOK_2').innerText="La direcci\u00F3n de email " + organigrama_correoEsc + " es incorrecta";
	}

	if(idCampo=="organigrama_correo3"){
		organigrama_correo3.className = 'form-control form-control-error';
		document.getElementById('emailOK_3').className = 'form-text form-text-error';
		organigrama_correo3.value="";
		document.getElementById('emailOK_3').innerText="La direcci\u00F3n de email " + organigrama_correoEsc + " es incorrecta";
	}

	if(idCampo=="organigrama_correo4"){
		organigrama_correo4.className = 'form-control form-control-error';
		document.getElementById('emailOK_4').className = 'form-text form-text-error';
		organigrama_correo4.value="";
		document.getElementById('emailOK_4').innerText="La direcci\u00F3n de email " + organigrama_correoEsc + " es incorrecta";
	}

	if(idCampo=="organigrama_correo5"){
		organigrama_correo5.className = 'form-control form-control-error';
		document.getElementById('emailOK_5').className = 'form-text form-text-error';
		organigrama_correo5.value="";
		document.getElementById('emailOK_5').innerText="La direcci\u00F3n de email " + organigrama_correoEsc + " es incorrecta";
	}

	if(idCampo=="organigrama_correo6"){
		organigrama_correo6.className = 'form-control form-control-error';
		document.getElementById('emailOK_6').className = 'form-text form-text-error';
		organigrama_correo6.value="";
		document.getElementById('emailOK_6').innerText="La direcci\u00F3n de email " + organigrama_correoEsc + " es incorrecta";
	}

	if(idCampo=="organigrama_correo7"){
		organigrama_correo7.className = 'form-control form-control-error';
		document.getElementById('emailOK_7').className = 'form-text form-text-error';
		organigrama_correo7.value="";
		document.getElementById('emailOK_7').innerText="La direcci\u00F3n de email " + organigrama_correoEsc + " es incorrecta";
	}

	if(idCampo=="organigrama_correo8"){
		organigrama_correo8.className = 'form-control form-control-error';
		document.getElementById('emailOK_8').className = 'form-text form-text-error';
		organigrama_correo8.value="";
		document.getElementById('emailOK_8').innerText="La direcci\u00F3n de email " + organigrama_correoEsc + " es incorrecta";
	}

	}	
}
/* Validacion de e-mail(fin) */