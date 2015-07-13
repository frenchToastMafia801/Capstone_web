<?php
/*mysqli connect creates a connection to mysql database
It has 4 parameters:
1) database (db) hostname: localhost is the alias for our mysql database server name or hostname
2) username
3) password
4) name of database 
Then, validate whether you can create a connection using an IF function
*/
$link = mysqli_connect("localhost", "writerbr_is6465", "is6465", "writerbr_template");
echo (!$link?die("connection failed"): "Hooray! It works.");

//if($link == FALSE) is equivalent to if(!$link)
/*
if(!$link)
	{die("Connection failed.");}
	else 
	{echo "Connection works!";}
*/
$val1 = "The Golden Bough";
$val2 = 157412;
$val3 = "Doubleday";
$sql = "INSERT INTO temp_table(title, length_in_words, publisher) VALUES('$val1', $val2, '$val3')";
echo $sql;

$results=mysqli_query($link, $sql);
echo (!$results?die(mysqli_error($link)):"it worked");


//could have written this query directly into the results variable. But, then you don't have a variable $sql to reuse. 
//Remember, variable names are case sensitive

?>