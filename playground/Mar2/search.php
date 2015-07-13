
<form method="GET" action="">
<input type="text" name="searchTerm" value ="<?php echo $searchTerm;?>">
<select name="sCat">
<option value="0">All</option>
<option value="1">Books</option>
<option value="2">Electronics</option>
</select>
<input type="submit" value="Search">

</form>

<?php

include("connect.php");
$searchTerm="";
if(!empty($_GET['searchTerm']))
{$searchTerm = $_GET['searchTerm'];
}

$sCat=0;
if(!empty($_GET["sCat"]) and $_GET["sCat"]>0)
{ $sCat = $_GET["sCat"];
}


$sql = "SELECT name, image, description FROM products 
WHERE (name like '%$searchTerm%' OR description like '%$searchTerm%')";
if ($sCat >0) {
$sql = "SELECT name, image, description FROM products 
WHERE (name like '%$searchTerm%' OR description like '%$searchTerm%') AND cat_id = $sCat LIMIT 5";}

$results = mysqli_query($link, $sql);
echo (!$results?die(mysqli_error($link). "<br>$sql"): "worked<br>");
$count = mysqli_num_rows($results);
for ($i=0; $i<$count;$i++){
list($name, $image, $id) = mysqli_fetch_array($results);
echo "<img src='$image'><br>$name<br>$id<br>";
}

?>