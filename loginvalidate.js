function login()
{
	var emailid=document.getElementById("email");
	var pwd=document.getElementById("pwd");
	if(emailValidator(emailid))
	{
		if(pwdvalidate(pwd))
		{
			alert("Login Successfull");
			return true;
		}
	}
	return false;
}
function emailValidator(elem)
{
	 var emailExp=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
	 if(emailExp.test(elem.value))
		 return true;
	else
	{
		 alert("Please enter a valid E-mail Id");
		 elem.focus();
		document.getElementById("email").value=""
		return false;
	}
}
function pwdvalidate(elem)
{
	var lengthExp=/^[0-9a-zA-Z ]+$/{8,15}$/;
	if(lengthExp.test(elem.value))
		return true;
	else
	{
		alert("Please enter a  Correct Password ");
		elem.focus();
		document.getElementById("pwd").value=""
		return false;
	}
}

