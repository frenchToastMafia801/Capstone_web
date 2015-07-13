<?php
//.../detail.php?productId=$id;
include("connect.php");
//You can call a file using either include or require. If you have require, it can't handle exceptions.
//IncludeOnce only runs the first time. If you include a file indirectly (B through C) then you can use includeOnce to 
//avoid an error

$productID = $_GET["id"];

if (empty($_GET["id"]))
{die("Product id missing");}

$sql = "SELECT name, id, price, image, description FROM products 
WHERE id=$productID";

$results = mysqli_query($link, $sql);

echo (!$results?die(mysqli_error($link). "<br>$sql"): "");
$count = mysqli_num_rows($results);
for ($i=0; $i<$count;$i++){
list($name, $id, $price, $image, $description) = mysqli_fetch_array($results);
echo "<a href='detail.php?productId=$id'><img src='uploads/$image'><br>$name</a><br>$price<br>$description<br>";
}

?>