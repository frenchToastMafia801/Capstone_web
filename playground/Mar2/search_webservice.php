<?php
include("connect.php");
$searchTerm="";
if(!empty($_GET['searchTerm'])) {
$searchTerm = $_GET['searchTerm'];
}

$sql = "SELECT id, name, price FROM products WHERE (name like '%$searchTerm%' OR description like '%$searchTerm%')";

$sCat=0;
if(!empty($_GET["sCat"]) and $_GET["sCat"]>0) {
 $sCat = $_GET["sCat"];
}

if ($sCat >0) {
$sql = "SELECT id, name, price FROM products 
WHERE (name like '%$searchTerm%' OR description like '%$searchTerm%') AND cat_id = $sCat LIMIT 5";}

$results = mysqli_query($link, $sql);
echo (!$results?die(mysqli_error($link). "<br>$sql"): "worked<br>");
$count = mysqli_num_rows($results);

$rows = array();
for ($i=0; $i<$count;$i++){

list($id, $name, $price) = mysqli_fetch_array($results);
$rows[$i]["id"] = $id;
$rows[$i]["name"] = $name;
$rows[$i]["price"] = $price;

}
echo json_encode($rows);

?>