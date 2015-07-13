<?php

$link = mysqli_connect("localhost", "writerbr_is6465", "is6465", "writerbr_template");
echo (!$link?die("connection failed"): "It works.");

$sql="SELECT id, title, length_in_words, publisher FROM temp_table";

$results=mysqli_query($link, $sql); 
echo (!$results?die(mysqli_error($link). "<br>". $sql):"");

$count = mysqli_num_rows($results);
for($i=0;$i<$count;$i++)
	{list($id,$title,$length_in_words,$publisher)=mysqli_fetch_array($results);
	echo "id is $id. Title is $title. Publisher is $publisher <br>";}

/*
	{$array = mysqli_fetch_array($results);
	$id=$array[0];
	$title=$array[1];
	$length_in_words=$array[2];
	$publisher=$array[3];
	}
*/
// COPY MYSQLI FETCH ARRAY NOTES



?>