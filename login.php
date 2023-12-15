<!------------------------------------validating username and password from database---------------------------------------->
<?php
session_start();
if($_POST)
{
//getting values
	$emailid = $_POST['email'];
	$password = $_POST['pwd'];

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
//seraching in database
	if($result=mysqli_query($con,"select * from register where emailid ='$emailid' and pwd = '$password' ")) 
	{
		$row=mysqli_fetch_array($result);
		if($row['emailid']==$emailid && $row['pwd']==$password)
		{
	    		echo '<script>';
		                echo 'alert("Login Successfull !!!")';  
		                echo '</script>';
			header('location:os.php');
		}
		else
		{
	   		echo '<script>';
	   		echo 'alert("Check your E-mail id or Password !!! ")';  
	   		echo '</script>';
		} 
		mysqli_close($con);
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=12">
<link rel="stylesheet" type="text/css" href="header.css" /> 
<link rel="stylesheet" type="text/css" href="mySidenav.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="login.css" />
<title>Login</title>
</head>
<body>
	<div class="header" >		
		<a href="#default"><img src="logo.png" width="100" height="110" align="middle" />Illicit goods complaint registration portal.</a>
	</div>
	<div id="mySidenav" class="sidenav">
  		<a href="main.php" id="Home">Home<i class="fa fa-home" aria-hidden="true"></i></a>
  		<a href="our_mission.php" id="Our_Mission">Our Mission<i class="fa fa fa-bullseye" aria-hidden="true"></i></a>
  		<a href="os.php" id="Our_Services">Our Services<i class="fa fa-superpowers" aria-hidden="true"></i></a>
  		<a href="gwd.php" id="good_work_done">Good work done<i class="fa fa-briefcase" aria-hidden="true"></i></a>
		<a href="contact_us.php" id="Contact_US">Contact US<i class="fa fa-phone-square" aria-hidden="true"></i></a>
		<a href="rl.php" id="Relative_Links">Relative Links<i class="fa fa-external-link" aria-hidden="true"></i></a>
		<a href="faq.php" id="FAQ">FAQ?<i class="fa fa-question-circle" aria-hidden="true"></i></a>
	</div>
	<div class="login"><br>
	<div class="log">
		  	<img src="login.png"  class="image" width="600"  height="400" />
	</div>
	 <br><br>
	  	<div class="login-right">
		<form action="login.php" method="POST">
		<h3>Email-ID :</h3><i class="fa fa-envelope icon"><input size="40px" type="text" placeholder="Enter Email-Id" name="email"/></i>			
			<h3>Password :</h3><i class="fa fa-key icon"><input size="40px" type="password" placeholder="Enter password" name="pwd"/></i>
			<br><br><button type="submit">Login</button>
			<br>Forgot <a href="forgotpwd.php">password ?</a>  
			 New user <a href="register.php">Register a new account!</a>	
	  
	  </div>
	</div> 
</form>	
</body>
</html>


