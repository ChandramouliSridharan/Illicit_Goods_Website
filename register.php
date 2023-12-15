<!------------------------------------validating username and password from database---------------------------------------->
<?php
session_start();
if($_POST)
{
//getting values
	$emailid = $_POST['email'];
	$password = $_POST['pwd'];
	$username= $_POST['uname'];
	$conpassword=$_POST['cpwd'];

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
	if(strcmp("$password","$conpassword")==0)
	{
		if($_POST['check'] == "yes")
		{
			$q1="INSERT INTO register(emailid, pwd, name) values ('$emailid','$password','$username')";
			$result=mysqli_query($con,$q1);
			if($result)		
			{
				echo '<script>';
				echo 'alert("New User signed in Successfully !!!")';  
				echo '</script>';
				header('location:login.php');
			}
			else
			{
				echo '<script>';
				echo 'alert("New User is not signed properly.Kindly Retry with all entries filled!!!")';  
				echo '</script>';
		
			}
		}
		else
		{
			echo '<script>';
			echo 'alert("Check Box not selected!!!")';  
			echo '</script>';
		}	
	}
	else
	{
		echo '<script>';
		echo 'alert("Password Doesnt match!!")';  
		echo '</script>';
		
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
<meta name="viewport" content="width=device-width, initial-scale=12">
<link rel="stylesheet" type="text/css" href="header.css" /> 
<link rel="stylesheet" type="text/css" href="mySidenav.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="register.css" />
<title>Register</title>
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
	<div class="register">
	  <div class="reg">
		  	<img src="register.png"  style="padding-top:180;" class="image" width="600"  height="400" />	
	</div>
	  <br><br>
	  	<div class="register-right">
			<form action="register.php" method="POST">
			<h3>User Name:</h3><i class="fa fa-user icon"><input size="40px" type="text" placeholder="Enter username(not your true name)" name="uname"></i>
			<h3>Email-ID :</h3><i class="fa fa-envelope icon"><input size="40px" type="text" placeholder="Enter Email-Id" name="email"></i>			
			<h3>Password :</h3><i class="fa fa-key icon"><input size="40px" type="password" placeholder="Enter Password" name="pwd"></i>
			<h3>Confirm Password :</h3><i class="fa fa-key icon"><input size="40px" type="password" placeholder="Enter password again" name="cpwd"></i>
			<br><br><input type="checkbox" name="check" value="yes">I hereby accect all <a href="terms-conditions.php">Terms and Conditions.</a>
			<br><br><button type="submit">Signup</button>
			
	  </div>
	</div> 
<form>
</body>
</html>
