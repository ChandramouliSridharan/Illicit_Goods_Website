<!------------------------------------validating username and password from database---------------------------------------->
<?php
session_start();
if($_POST)
{
//getting values
	$complaint = $_POST['type'];
	$name = $_POST['organisation'];
	$add= $_POST['place'];
	$date=$_POST['doc'];
	$detail=$_POST['details'];

/*prevent sql injection
	$emailid=stripcslashes($emailid);
	$password=stripcslashes($password);
	$emailid=mysql_real_escape_string($emailid);
	$password=mysql_real_escape_string($password);*/

//conection
	$con = mysqli_connect('localhost', 'root', '','illicitdb');
	if (!$con)
	{	
	   die('Could not connect: ' .mysqli_error());
	}	
//inserting in database.
	$q1=" select  complaintid from complaint ORDER BY complaintid DESC LIMIT 1";
	$result=mysqli_query($con,$q1);
	$row=mysqli_fetch_row($result); 
	$cid=1;
	$cid=$cid +$row[0];
	if(isset($_POST["submit"]))
	{
		$file=$_FILES['evidence'];
		$name=$_FILES['evidence']['name'];
		$type=$_FILES['evidence']['type'];
		$tempname=$_FILES['evidence']['temp'];
		$fileext=explode('.',$name);
		$fileactualext=strtolower(end($fileext));
		$allowed=array('jpg' , 'jpeg' , 'png' , 'pdf' , 'doc' , 'docx' , 'odt' , 'txt' , 'mp4' , 'mp3');
		if(in_array($fileactualext,$allowed))
		{
			$filenamenew=uniqid('',true).".".$fileactualext;
			$filedestination='evidence/'.$filenamenew;
			move_uploaded_file($tempname,$filedestination);
		}
		else
		{
			echo '<script>';
			echo 'alert("File type not allowed!!!")';  
			echo '</script>';
		}
		$q1="INSERT INTO complaint (complaintid,complaint,name,address,doc,description,evidence) VALUES ($cid,'$complaint','$name','$add','$date','$detail','$filenamenew')";
		$result=mysqli_query($con,$q1);
		if($result)		
		{
			echo '<script>';
			echo 'alert("Complaint RegisteredSuccessfully !!!")';  
			echo '</script>';
			header('location:main.php');
		}
		else
		{
			echo '<script>';
			echo 'alert("Complaint not Registered.Kindly retype all the details!!!")';  
			echo '</script>';
		}
	}
	mysqli_close($con);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="firvalidate.js">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="header.css" /> 
<link rel="stylesheet" type="text/css" href="mySidenav.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="login.css" />
<title>Provide Intel</title>
</head>
<body  >
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
	</div><h2 style="font-family:Caladea;color:#9933ff;text-align:center;">Complaint Registration</h2>
	<div class="login"><br>
	  	<div class="login-right" >
		<form action="intel.php" method="POST"  enctype="multipart/form-data">
		<table border="0" cellspacing="12px" cellpadding="12px" align="right">
		<tr>
			<td><h3>Complaint on:</h3><i class="fa fa-crosshairs icon"><select name="type">
		 		<option selected>--PLEASE CHOOSE--</option>
				<option>Grey Market</option>
				<option>Counterfeit Goods</option></select></i></td>	
			<td><h3>Name of organization:</h3><i class="fa fa-sitemap icon"><input type="text" placeholder="Organization name:-" name="organisation"></i></input></td>
		</tr>
		<tr>		
			<td><h3>Address:</h3><i class="fa fa-map-marker icon"><input type="text" placeholder="Organization address and location:-"  name="place"/></h3></i></td>
			<td><h3>Date Of Complaint:</h3><i class="fa fa-calendar icon"><input type="date" name="doc"/></h3></i></td>
		</tr>
		<tr>
			<td><h3>Description About The Complaint:</h3><i class="fa fa-file-text icon"><textarea rows="5" cols="50" placeholder="Discription of how you came across this organisation:-" name="details"></textarea></i></td>
			<td><h3>Kindly Attach Evidence(Photos,Videos,file):</h3><i class="fa fa-file icon"><input  type="file" name="evidence"/></i></td></tr></table>
		<br><br><center><button  type="submit" name="submit">Submit</button></center>
		</form>	
	  </div>
	</div>	
</body>
</html>
