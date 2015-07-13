<?php
session_start();
include("connect.php");

//Grab the login credentials

$username = $_POST['username'];
$password = sha1($_POST['password']);

//Query for the user's record

$sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
$results=mysqli_query($link,$sql);
echo (!$results?die(mysqli_error($link)."<br>".$sql):"You are logged in.");

$count = mysqli_num_rows($results);
if($count>0) //if count > 0, then you know there is at least one user
	{
	list($userId)=mysqli_fetch_array($results);
	$time = time();
	$_SESSION["userId"]=$userId;
	$_SESSION["username"]=$username;
	$_SESSION["time"]=$time;
	
	//You don't need to set cookies if you use a session. 
	
	header("Location:verify.php");
	}
else {}

	
?>