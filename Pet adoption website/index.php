<?php
session_start();
include_once 'dbconnect.php';



if(isset($_SESSION['user'])!="")
{
	header("Location: homepage.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM users WHERE email='$email'");
	$row=mysql_fetch_array($res);
	
	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: homepage.php");
	}
	else
	{
		?>
        <script>alert('wrong details');</script>
        <?php
	}	
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration</title>
<link rel="stylesheet" href="style.css" type="text/css" />


</head>
<body background="dog.jpg">


<center>
<h1>Adopt A Pet Today!</h1>
<div id="login-form">
<form method="post" name="form">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" id="pass" name="pass" minlength="5" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Sign Up Here</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="forgotpass.php">Forgot password?</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>