function cancel()
{
	var complaint=document.getElementById("firno");
	if(isNumeric(complaint))
	{
		alert("Complaint Cancelled");
		return true;
	}
	return false;
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
		document.getElementById("firno").value=""
		return false;
	}
}
