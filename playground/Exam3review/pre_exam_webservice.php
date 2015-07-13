<?php
include("connect.php");

$username = $_POST['username'];

//$username="";
//if(!empty($_POST['username'])) {
//$searchTerm = $_POST['username'];
//}

$sql = "SELECT username FROM users WHERE username = '$username'";

$results = mysqli_query($link, $sql);
echo (!$results?die(mysqli_error($link). "<br>$sql"): "");
$count = mysqli_num_rows($results);

if ($count == 0) {
	echo 0;
}

else {
	echo 1;
}

?>