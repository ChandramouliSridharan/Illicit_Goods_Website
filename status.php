<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="statusvalidate.js">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Complaint Status</title>
<link rel="stylesheet" type="text/css" href="header.css" /> 
<link rel="stylesheet" type="text/css" href="mySidenav.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="login.css" /><link rel="stylesheet" type="text/css" href="popup.css" />
</head>

<body>
<div class="header" >
		<a href="#default"><img src="logo.png" width="100" height="110" align="middle" />Illicit goods complaint registration portal.</a>
</div>
	<div id="mySidenav" class="sidenav">
  		<a href="main.php" id="Home"style="background-color:#ffffff">Home<i class="fa fa-home" aria-hidden="true"></i></a>
  		<a href="our_mission.php" id="Our_Mission">Our Mission<i class="fa fa fa-bullseye" aria-hidden="true"></i></a>
  		<a href="os.php" id="Our_Services">Our Services<i class="fa fa-superpowers" aria-hidden="true"></i></a>
  		<a href="gwd.php" id="good_work_done">Good work done<i class="fa fa-briefcase" aria-hidden="true"></i></a>
		<a href="contact_us.php" id="Contact_US">Contact US<i class="fa fa-phone-square" aria-hidden="true"></i></a>
		<a href="rl.php" id="Relative_Links">Relative Links<i class="fa fa-external-link" aria-hidden="true"></i></a>
		<a href="faq.php" id="FAQ">FAQ?<i class="fa fa-question-circle" aria-hidden="true"></i></a>	
	</div>
	<h2 style="font-family:Caladea;color:#9933ff;text-align:center;">Complaint Status</h2>
	<div class="login">
	<br>
		 <div class="log">
	  	<img src="kindpng_1756768.png"  class="image" width="600"  height="400" />
		</div>
	  <br><br>
			<div class="login-right">
				<form action="status.php" method="POST">
				<h3>Complaint-ID :</h3><i class="fa fa-file icon"><input size="40px" type="text" placeholder="Enter Complaint-Id" name="firno"/></i>			
				<br><br><button type="submit" id="mb">Status</button>
				<div id="myModal" class="modal">
				<!-- Modal content -->
					<div class="modal-content">
						<span class="close">&times;</span>
						<table border="0" cellspacing="5" cellpadding="5">
						<tr>
							<th>Complaint-ID</th>
							<th>Status</th>
						</tr>
						<?php
						if($_POST)
						{	
							//getting values
							$cid = $_POST['firno'];
							//conection
							$con = mysqli_connect('localhost', 'root', '','illicitdb');
							if (!$con)
							{	
							   die('Could not connect: ' .mysqli_error());
							}
							//selecting in database.
							$q1=" select status from complaint where complaintid=$cid ";
							$result=mysqli_query($con,$q1);
							$row=mysqli_fetch_array($result); 
							$status="$row[0]";
							$rowcount=mysqli_num_rows($result);
							if($rowcount>0)
							{
								echo "<tr> <td>";
								echo $cid;
								echo "</td><td>";
								echo "$status";
								echo "</td></tr>";
								echo"</table>";							
							}
							else
							{
								echo '<script>';
							              	echo 'alert("Status not yet updated !!!")';  
							              	echo '</script>';
							}
							mysqli_close($con);
						}
						?>
					</table>
					</div>

				</div>

				<button type="button"  onclick="location.href='os.php'"value="Cancel">Cancel</button>
			 </div>
	</div> 
</body>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("mb");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  document.getElementById("firno").value="";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
 }


</script>

</html>
