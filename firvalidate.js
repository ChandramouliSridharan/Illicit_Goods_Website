function fv()
{
	var complaint=document.getElementById("type");
	var organisation=document.getElementById("organisation");
	var addr=document.getElementById("place");
	var doc=document.getElementById("dates");
	var describe=document.getElementById("details");
	var file=document.getElementById("evidence");
	if(madeSelection(complaint))
	{
		if(isAlphabet(organisation))
		{
			if(isAlphanumeric(addr))
			{
				if(dvalidate(doc))
				{
					if(textvalidate(describe))
					{
						if(validate(file))
						{
							alert("After Successful Validation,your Complaint is Submitted");
							return true;
						}
					}
				}
			}
		}
	}
	return false;
}
function fpwd()
{
	var emailid=document.getElementById("email");
	if(emailValidator(emailid))
	{
		alert("Password Reset link has been send to your E-mail Id");
		return true;
	}
	return false;
}
function newuser()
{
	var name=document.getElementById("uname");
	var emailid=document.getElementById("email");
	var pwd=document.getElementById("pwd");
	var conformpwd=document.getElementById("cpwd");
	if(isAlphabet(name))
	{
		if(emailValidator(emailid))
		{
			if(pwdvalidate(pwd))
			{
				if(cnfrmpwd(pwd,conformpwd))
				{
					alert("New User has been successfully Registered");
					return true;
				}
			}
		}
	}
	return false;
}
function madeSelection(elem)
{
	if(elem.value=="--PLEASE CHOOSE--")
	{
		alert("Please Choose the Type of Complaint");
		elem.focus();
		return false;
	}
	else
	{
		return true;
	}
}
function isAlphabet(elem)
{
	var alphaExp=/^[a-zA-Z]+$/;
	if(alphaExp.test(elem.value))
		return true;
	else
	{
		alert("Please Enter the Name of the Organisation");
		elem.focus();
		return false;
	
	}
}
function isAlphanumeric(elem)
{
	var alphaExp=/^[0-9a-zA-Z ]+$/;
	if(alphaExp.test(elem.value))
		return true;
	else
	{
		alert("Please enter a Valid Address which Contain only Alphabets and numbers");
		elem.focus();
		return false;
	}
}
function dvalidate(elem)
{
	var pattern =/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
	if(pattern.test(elem.value))
		return true;
	else
	{
		alert("Please enter a Valid Date of Complaint");
		elem.focus();
		return false;
	}
}
function textvalidate(elem)
{
	if(elem.value.length==0)
	{
		alert("Please enter some Desciption about the Organisation");
		elem.focus();
	}
	return true;
}
function validate(elem)
{
	var fileName =elem.value;
	var ext = fileName.split('.').pop().toLowerCase();
	if(ext == "gif" || ext == "png" || ext == "docx" || ext == "pdf" || ext == "jpg" || ext == "jpeg" || ext == "mp3"||ext=="wmv"||ext == "ape"|| ext == "mpeg"|| ext == "3gp"|| ext == "mp4"|| ext == "txt"|| ext == "odt"|| ext == "rtf")
	{
		return true;
	} 
	else
	{
		alert("Upload a valid Evidence file");
		elem.focus();
		return false;
	}
}
function isNumeric(elem)
{
	var numericExpression=/^[0-9]+$/;
	if(numericExpression.test(elem.value))
		return true;
	else
	{
		alert("Please enter a valid Complaint Id");
		elem.focus();
		return false;
	}
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
		return false;
	}
}

