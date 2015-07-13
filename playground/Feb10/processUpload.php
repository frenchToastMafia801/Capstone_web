<?php

$target_path = "uploads/1.jpg";
//echo basename($_FILES["uploadedFile"]["name"]);
$providedFileName= basename($_FILES["uploadedFile"]["name"]);
$target_path = "uploads/$providedFileName";


if(move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_path))
{echo "file uploaded" and "$target_path";}
else {echo "file failed to upload";}

?>