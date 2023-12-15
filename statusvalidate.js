function status()
{
	var complaint=document.getElementById("firno");
	if(isNumeric(complaint))
	{
		var modal = document.getElementById("myModal");
		var btn = document.getElementById("mb");
		var span = document.getElementsByClassName("close")[0]; 
		btn.onclick = function() {
		modal.style.display = "block";
		}
		span.onclick = function() {
		modal.style.display = "none";
		}
		window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
			}
		}z
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
