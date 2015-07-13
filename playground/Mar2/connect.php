<?php

//Link to the database

$link = mysqli_connect("localhost", "writerbr_is6465", "is6465", "writerbr_template");
echo (!$link?die("Oops... Something went wrong"):"Connected");

?>