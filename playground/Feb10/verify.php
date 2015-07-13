<?php
sessoin_start();
if(!empty($_SESSION["userId"]) and !empty($_SESSION["userName"]) and !empty($_SESSION["time"]))
	{
	
	$userId=$_SESSION["userId"];
	$username=$_SESSION["username"];
	$time=$_SESSION["time"];
	
	}
else { 
	header("Location:login.html"); 
	exit;
	}
	
echo "Welcome $username !";

?>

	