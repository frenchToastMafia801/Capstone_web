<? php

//if cookies have been set
if(!empty($_COOKIE['userId']) and !empty($_COOKIE['userName']) and !empty($_COOKIE['time']) and !empty($_COOKIE['hash']))
	{
	 //recalculate hash based on cookies and match cookie hash with calculated hash
  	$userId=$_COOKIE['userId'];
  	$userName=$_COOKIE['userName'];
  	$time=$_COOKIE['time'];
  	$cookieHash=$_COOKIE['hash'];

  	$secret = "no soul knows this";
  	$calculatedHash = sha1($userId.$userName.$time.$secret);
  	if($calculatedHash != $cookieHash){
    	//since the calculated hash did not match with hash from cookie, some information has been tempered with; so send the user to login page for logging in again. 
	{header("Location:login.html");
	}
else {header("Location:login.html");}
exit;
echo "Welcome $userName !";