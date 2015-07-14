<?php

//Link to the database

$link = mysqli_connect("184.154.225.13", "compapp6_ftm", "Frenchtoastmafia21", "compapp6_capstone");
echo (!$link?die("Oops... Something went wrong"):"");

?>