<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Donor Login</title>
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
		background-image: url('img/bg1.jpeg');										
		background-position: midle;
		background-repeat: no-repeat;
		background-size: 100%;
		font-family: 'times', sans-serif;
		background-color: #CCFFCC;
		
	}
	div{
		
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
		
		<div >
			<h2>Donor Login</h2><br />
			<input class="form-control" type="text" name="username" placeholder="Username"  required/><br />
			<input class="form-control" type="password" name="password"	placeholder="Password" required /><br />
			<input class="btn btn-success" type="submit" name="login" value="LogIn" /><br />
			or<br />
			<a href="register.php"><input class="btn btn-info" type="button" name="signup" value="Register" /></a>
			
		</div>
	</form>
	</center>

</body>
</html>
