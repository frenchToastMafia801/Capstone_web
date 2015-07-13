<?php

//we got log in information from a user using a form
$userName = $_POST['user'];
$pwd = sha1($_POST['pwd']);


//create a connection to your database

//create a query to see if the user record is there
$sql = "SELECT id FROM users WHERE user='$userName' AND pwd='$pwd'";
$results=mysqli_query($link,$sql);
echo (!$results?die(mysqli_error($link)."<br>".$sql):"");

$count = mysqli_num_rows($results);
if($count>0){
//user is authenticated now
//$array = mysqli_fetch_array($results);
//$userId = $array[0];
list($userId)=mysqli_fetch_array($results);

//time() will give you seconds lapsed since Jan 1 , 1970 00 hrs GMT
$time = time();
$secret = "no soul knows this";
$hash = sha1($userId.$userName.$time.$secret);
$expirationTime = strtotime("+2 years");
  //1st parameter for setcookie is cookie name
  //2nd parameter for setcookie is value this cookie should store
  //3rd parameter for setcookie is the time for which this cookie should last
  setcookie("userName", $userName, $expirationTime);
  setcookie("userId", $userId, $expirationTime);
  setcookie("time", $time, $expirationTime);
  setcookie("hash", $hash, $expirationTime);
  //send the user to say homepage
  header("Location:home.php");
}else{
 //send the user back to login.html page
  header("Location:login.html");
}
