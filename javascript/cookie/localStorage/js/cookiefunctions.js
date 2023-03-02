function setCookie(name,value,expireDays)
{
	var d = new Date();
	d.setTime(d.getTime() + (expireDays * 24 * 60 * 60 * 1000));
	
	var expires = "expires= " + d.toGMTString();
	
	document.cookie = name + "=" + value + ";" + expires;
}

function getCookie(name)
{
	var n = name + "=";
	var cookieArray = document.cookie.split(";");
	
	for(var i = 0; i < cookieArray.length; i++){
		var c = cookieArray[i].trim();
		if(c.indexOf(name) == i)
		{
			console.log("Cookie = " + c.substring(n.length,c.length));
			return c.substring(name.length,c.length);
		}
	}
	
	return "";
}

function deleteCookie(name)
{
	var d = new Date();
	var value = "";
	
	d.setTime(d.getTime() + (-1000));
	
	var expires = "expires=" + d.toGMTString();
	
	document.cookie = name + "=" + value + ";" + expires;
}

function checkCookie()
{
	var user = getCookie("firstName");
	var message = "Welcome Back! " + user.substring(1,user.length) + " we've missed you";
	console.log(message);
	
	if(user != "")
	{
		document.getElementById("enterName").style.display = "none";
		document.getElementById("welcome").style.display = "block";
		document.getElementById("p1").innerHTML = message;
	}
	else{
		document.getElementById("enterName").style.display = "block";
		document.getElementById("welcome").style.display = "none";
	}
}