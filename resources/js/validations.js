export function valideKeyLetter(evt){   
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
 }

 export function validateOnlyLetter(evt) {
 if ((evt.keyCode != 32) && (evt.keyCode < 65) || (evt.keyCode > 90) && (evt.keyCode < 97) || (evt.keyCode > 122))
  evt.returnValue = false;
}

export function validateEmail(name){               
	// Get our input reference.
	var emailField = document.getElementById(name);
	
	// Define our regular expression.
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

	// Using test we can check if the text match the pattern
	if( validEmail.test(emailField.value) ){
		// alert('Email is valid, continue with form submission');
		return true;
	}else{
		alert('El email tiene un formato incorrecto');
		return false;
	}
}

// onKeyUp para validar cada vez que se presiona una tecla
export function valideMinLength(evt){   
	alert(evt);
	if(evt.value.length>=evt.maxLength){
		alert('Formato incorrecto, verifique!');
	}
 }

 export function valideMaxLength(evt){   
	if(this.value.length>=this.maxLength){
		alert('Formato incorrecto, verifique!');
	}
 }

//  export { valideKeyLetter, validateOnlyLetter, validar,validateEmail, valideMinLength, valideMaxLength };