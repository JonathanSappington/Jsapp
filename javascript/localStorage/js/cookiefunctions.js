function setCookie(cookieName,cookieValue,expireDays)
{
    var d = new Date();
    d.setTime(d.getTime()+ (expireDays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cookieName + "=" + cookieValue + ";" + expires;
}

function getCookie(cookieName)
{
    var name = cookieName + "=";
    console.log(document.cookie);
    var cookieArray = document.cookie.split(";");
    for(var i = 0; i < cookieArray.length;i++)
    {
        var c = cookieArray[i].trim();
        if(c.indexOf(cookieName) == 0)
        {
            console.log("Cookie name is " + c.substring(name.length,c.length));
    return c.substring(name.length,c.length);
}

}
return "";
}

function deleteCookie(cookieName)
{
    var d = new Date();
    var cookieValue = "";
    d.setTime(d.getTime() + (-1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cookieName + "=" + cookieValue + ";" + expires;
}



//set for the specific site
function checkCookie()
{
    var user = getCookie("firstname");
    var message = "Welcome Back" + user + " we've missed you. ";
    console.log(message);

    if(user != "")
    {
        document.getElementById("EnterName").style.display = "none";
        document.getElementById("Welcome").style.display = "block";
        document.getElementById("p1").innerHTML = message;
}
else
{
        document.getElementById("EnterName").style.display = "block";
    document.getElementById("Welcome").style.display = "none";    
}

}
