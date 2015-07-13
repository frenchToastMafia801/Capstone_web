<?php
include("secret.php");

//Grab the login credentials

$username = $_POST['username'];
$password = sha1($_POST['password']);

//Link to the database

$link = mysqli_connect("localhost", "writerbr_is6465", "is6465", "writerbr_template");
echo (!$link?die("Oops... Something went wrong"):"Logging you in...");

//Query for the user's record

$sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
$results=mysqli_query($link,$sql);
echo (!$results?die(mysqli_error($link)."<br>".$sql):"You are logged in.");

$count = mysqli_num_rows($results);
if($count>0)
	{
	list($userId)=mysqli_fetch_array($results);
	$time = time();
	$hash = sha1($userId.$username.$time.$secret);
	$expirationTime = strtotime("+2 years"); //strtotime is "string to time" and this sets the expiration for the cookies
	setcookie("username", $username, $expirationTime);  //can't set a cookie by using $_cookie. Must user setcookie
	setcookie("userId", $userId, $expirationTime); //3 parameters: __, vlaue, expiration time
	setcookie("time", $time, $expirationTime); //not setting a expiration time creates a nonpersistant cookie
	setcookie("hash", $hash, $expirationTime);
	header("Location:verify.php");
	}
else {header("Location:login.html");}

	
?>

