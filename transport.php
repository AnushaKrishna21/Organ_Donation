<?php
	require('db.php');
	include("admin_auth.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Receive Organ</title>
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
	
	<form method='GET'>
		<center>
			<div style='width:300px; margin-top:50px'>
				<h2> Transaction Details:</h2>
				Donor ID:
				<input class='form-control' type='text' name='donid' placeholder='Donor ID' style='margin-bottom:10px' value="<?php if(isset($_GET['did'])){ echo $_GET['did'];} ?>" required/>
				<input class='form-control' type='text' name='hid' placeholder='Enter Hospital ID' style='margin-bottom:10px' required/>
				<input class='form-control' type='text' name='amount' placeholder='Enter Amount' style='margin-bottom:10px' required/>
				<input type='submit' class='btn btn-success' name='update' value='Update' style='margin:10px'>	
			</div>
		</center> 
	</form>
	
</body>
</html>

<?php

 

if (isset($_GET['update']))
{
  
	    // removes backslashes


	$did = $_GET['donid'];
	$hid = stripslashes($_REQUEST['hid']); 
	$amount = stripslashes($_REQUEST['amount']);
	$query = "INSERT into `transaction` (h_id,d_id,amount)
				VALUES ('$hid','$did','$amount')";
    $result = mysqli_query($con,$query);
    if($result)
	{
		echo "<div class='alert alert-success'>
			<h3>Transaction done successfully.</h3>
			<br/>Click here to <a href='index.html'>Homepage</a></div>";
			$sql="UPDATE `donor` SET status='donated' WHERE id='$did'";
		
				if(mysqli_query($con,$sql))
				{
					//echo "deleted $username data";
					echo "<div class='alert alert-success'>
							<strong>Updated!</strong> Successfully..!!.
							</div>";
				}
				else
				{
					echo (mysqli_error($con));
				}
    }
	else
	{
			echo "<div class='alert alert-danger'>
				<strong>Warning!</strong>Failed. Pleas try again.
				</div>";
			echo (mysqli_error($con));
			
	}
	
	

}
?>