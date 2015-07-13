
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
echo (!$link?die("connection failed"): "Hooray! It works. ");

$username = $_POST['username'];
$password = sha1($_POST['password']); //Always encrypt the passwords people enter to mitigate liability. Encrypt on the web server, not the database.

$sql = "INSERT INTO users(username,password) VALUES('$username', '$password')"; 

$authenticate=mysqli_query($link, $sql); 
echo (!$authenticate?die(mysqli_error($link)):"You're in.");




?>