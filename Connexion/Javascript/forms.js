function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, Prenom, Nom, Usager, MotDePasse, ConfirmerMDP)
{
     // Check each field has a value
    if (Usager.value == '' || MotDePasse.value == ''  || ConfirmerMDP.value == '')
	{
        alert('You must provide all the requested details. Please try again');
        return false;
    }
 
    // Check the username
 
    re = /^\w+$/; 
    if(!re.test(form.Usager.value))
	{ 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.Usager.focus();
        return false; 
    }
 
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (MotDePasse.value.length < 6)
	{
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.MotDePasse.focus();
        return false;
    }
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(MotDePasse.value))
	{
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
 
    // Check password and confirmation are the same
    if (MotDePasse.value != ConfirmerMDP.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.MotDePasse.focus();
        return false;
    }
 
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(MotDePasse.value);
 
    // Make sure the plaintext password doesn't get sent. 
    MotDePasse.value = "";
    ConfirmerMDP.value = "";
 
	var data = new FormData();
	data.append('Prenom', form.Prenom.value);
	data.append('Nom', form.Nom.value);
	data.append('Usager', form.Usager.value);
	data.append('p', hex_sha512(MotDePasse.value));

	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		
			var NewOption= document.createElement("option");
			NewOption.value = NomDossier;
			NewOption.innerHTML = NomDossier;
			ChoixDossier.appendChild(NewOption);
			
			if (xmlhttp.responseText != "")
				ActiveThumbnailsContainer.innerHTML = xmlhttp.responseText;
		}
	};

	var url = "/projet/h2015/equipe6/Admin/Code PHP/register.inc.php";
	xmlhttp.open('POST', url);
	xmlhttp.send(data);
}
