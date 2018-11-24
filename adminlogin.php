<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Login</title>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
<!--
	.style1 {
	font-family: "Times New Roman", Times, serif;
	color: #000099;
	font-size: 50px;
	
	}
-->
	body {
		background-image: url('img/bg5.jpeg');										
		background-position: midle;
		background-repeat: no-repeat;
		background-size: 100%;
		font-family: 'times', sans-serif;
		background-color: #CCFFCC;
	}
	.box{
		
		margin-top:200px;	
		width:300px;
		border:thick;
		border-color:#000033;
		height:350px;
		
		padding:20px;
		border-style:groove;
		border-color:#990000;
		padding-top:30px;
		
		}
</style>
</head>

<body>

	<center>
	<form action="" method="post">
		
		<div class="box" >
			<h2>Admin Login</h2><br />
			<input class="form-control" type="text" name="username" placeholder="Username"  required/><br />
			<input class="form-control" type="password" name="password"	placeholder="Password" required /><br />
			<input class="btn btn-success" type="submit" name="login" value="LogIn" /><br />		
		</div>
	</form>
	</center>
	
</body>
</html>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username']))
{
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin_login` WHERE username='$username'
and password='$password'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	$rows = mysqli_num_rows($result);
    if($rows==1)
	{
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: donors.php");
    }else
	{
		echo "<div >
		<h3>Username/password is incorrect.</h3>
		<br/>Click here to <a href='adminlogin.php'>Login</a></div>";
	}
  }
?>
