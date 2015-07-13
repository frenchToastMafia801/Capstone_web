<?php

inlcude("secret.php");

if(!empty($_COOKIE['userId']) and !empty($_COOKIE['username']) and !empty($_COOKIE['time']) and !empty($_COOKIE['hash']))
	{
	$userId=$_COOKIE['userId'];
	$username=$_COOKIE['username'];
	$time=$_COOKIE['time'];
	$cookieHash=$_COOKIE['hash'];
	$calculatedHash = sha1($userId.$username.$time.$secret); //This secret doesn't come from cookie

		if($calculatedHash != $cookieHash) //If the cookies are incorrect, send the user back to login
		{header("Location:login.html");
		exit;}
	}
else { 
	header("Location:login.html");  //If the cookies aren't complete, send the user back to login
	exit;
	}
	
echo "Welcome $username !";

?>

	