
<html>
<head>
<title>Authentication</title>
</head>
<body>
<h1>Please enter username and password</h1>
<form method="post" action="">

Username: 
<input type="text" name="username"><br />
Password:
<input type="password" name="password"><br />
<input type="submit" value="Submit">
</form>
</body>
</html>

<?php

$link = mysqli_connect("localhost", "writerbr_is6465", "is6465", "writerbr_template");
echo (!$link?die("connection failed"):"" );

$username = $_POST['username'];
$password = ($_POST['password']); 

$sql = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password'";

$results=mysqli_query($link, $sql); 
echo (!$results?die(mysqli_error($link). "<br>". $sql):"");

$count = mysqli_num_rows($results);
echo $count>0 ? "You're in." : "Nope" ;

/*
if($count>0)
	{echo "You're in";}
	else {echo "Nope.";}
*/	
/*
$authenticate=mysqli_query($link, $sql); 
echo (!$authenticate?die(mysqli_error($link)):"You're in.");
*/




?>