<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Request Organ</title>
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
	label{
		font-size:24px;
		color: #CC0000;
		font-weight:200;
		
		}
</style>
</head>

<body>
	<center>
		<form action="" method="post">
			
			<div style="margin-top:100px; width:300px">
				<h2 style="color: #660099"><b>Request Organ :</b></h2><br />
				<select class="form-control" name="organ" style="margin-bottom:10px">
					<option value="">Select Organ</option>
					<option value="eye">Eye</option>
					<option value="kidney">Kidney</option>
					<option value="liver" > Liver</option>
				</select>
				<select class="form-control" name="btype" style="margin-bottom:10px">
					<option value="">Select Blood Type</option>
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
				</select>
				<input class="form-control" type="text" name="name" placeholder="Enter Your Name" style="margin-bottom:10px" required/>
				<input class="form-control" type="text" name="phno" placeholder="Mobile No" style="margin-bottom:10px" required/><br />
				<input class="btn btn-info" type="submit"  name="request" value="Request" />
			</div>
		</form>
	</center>
</body>
</html>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['request']))
{
        // removes backslashes
	$organ = stripslashes($_REQUEST['organ']); 
	$btype = stripslashes($_REQUEST['btype']);
	$ph_no = stripslashes($_REQUEST['phno']);
	$name = stripslashes($_REQUEST['name']);
	
	$query = "INSERT into `request` (name,phno,btype,organ)
				VALUES ('$name','$ph_no','$btype','$organ')";
    $result = mysqli_query($con,$query);
    if($result)
	{
		echo "<div class='alert alert-success'>
			<h3>You are request send successfully.</h3>
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