<?php
	require('db.php');
	include("admin_auth.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Hospitals</title>

<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style type="text/css">
	body {
		background-image: url('img/bg5.jpeg');										
		background-position: midle;
		background-repeat: no-repeat;
		background-size: 100%;
		font-family: 'times', sans-serif;
		background-color: #CCFFCC;
	}
</style>
</head>

<body>

		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<!-- Brand/logo height: 100%; -->
		<a class="navbar-brand" href="index.html"><img src="img/blood3.jpeg" alt="logo" style="height:70px;"></a>
  
		<!-- Links -->
		<ul class="navbar-nav">
			<li class='nav-item'>
				<a class='nav-link' href='index.html'>Home</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='donors.php'>Donors</a>
			</li>
			
			<li class='nav-item'>
				<a class='nav-link' href='org_bank.php'>Organ Bank</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='hospitals_list.php'>Hospitals</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='requests.php'>Organ Requests</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='transactions.php'>Organ Transaction</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='register.php'>Goto Registration</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='admin_logout.php'>LogOut</a>
			</li>
		</ul>
	</nav>
	
		<center>
		<form action="" method="post">
			
			<div style="margin-top:100px; width:300px">
				<h2 style="color: #660099"><b>Hospitals :</b></h2><br />
				
				<input class="form-control" type="text" name="h_name" placeholder="Hospital Name" style="margin-bottom:10px" required/>
				<input class="form-control" type="text" name="h_address" placeholder="Hospital Address" style="margin-bottom:10px" required/>
				<input class="form-control" type="text" name="h_phno" placeholder="Hospital Phone No" style="margin-bottom:10px" required/><br />
				
				<input class="btn btn-info" type="submit"  name="submit" value="Submit" />
			</div>
		</form>
	</center>
</body>
</html>

<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['submit']))
{
        // removes backslashes
	$hname = stripslashes($_REQUEST['h_name']); 
	$haddress = stripslashes($_REQUEST['h_address']);
	$hph_no = stripslashes($_REQUEST['h_phno']);
	
	
	$query = "INSERT into `hospitals` (h_name,h_phno,h_address)
				VALUES ('$hname','$hph_no','$haddress')";
    $result = mysqli_query($con,$query);
    if($result)
	{
		echo "<div class='alert alert-success'>
			<h3>Data added successfully.</h3>
			<br/>Click here to <a href='index.html'>Homepage</a></div>";
	exit();
    }
	else
	{
			echo "<div class='alert alert-danger'>
				<strong>Warning!</strong>Failed. Pleas try again.
				</div>";
			echo (mysqli_error($con));
			exit();
	}
	
}

?>