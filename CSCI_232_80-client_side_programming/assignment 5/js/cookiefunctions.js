function validate(field, minLimit, maxLimit, ichars)
{
	var error = "";
	var illegalChars = ichars;
	
	if(field.value == "") // If field contains an empty string then display error
		error = "Error - Field is empty";
	else if((field.value.length >= maxLimit && maxLimit != 0)) // If a fields length is >= the max limit and if maxlimit doesn't eqaul 0 then display error
		error = "Error - Field is too long";
	else if(field.value.length < minLimit) // If a fields length is less then min limit then display error
		error = "Error - Field is too short";
	else if(illegalChars.test(field.value)) // If a field contains illegal characters then display error
		error = "Error - Illegal Characters";
	else // If no errors found then change the display
		field.style.background = "#00000000";
	
	if(error != "")
	{
		field.style.border = "1px solid red";
		field.placeholder = error;
		field.value = "";
	}
	
	return error;
}

function hideWarningBox(tagID)
{
	// If box is focused on then remove error message
	document.getElementById(tagID).style.border = "1px solid #ccc";
	document.getElementById(tagID).placeholder = "";
}

// Checks whether element is present within localstorage
function checkLocalStorage()
{
	var user = localStorage.getItem("firstName");
	
	// If user does exist then change main page to welcome dialog
	// Else keep page as sign-up
	if(user != null)
	{
		var message = "Welcome Back! " + user.substring(0,user.length) + " we've missed you";
		document.getElementById("enterName").style.display = "none";
		document.getElementById("welcome").style.display = "block";
		document.getElementById("p1").innerHTML = message;
	}
	else{
		document.getElementById("enterName").style.display = "block";
		document.getElementById("welcome").style.display = "none";
	}
}