<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("Location: adminlogin.php");
	exit(); 
}
$user=$_SESSION["username"];
if($user!='admin')
{
	header("Location: adminlogin.php");
	exit();
}
?>