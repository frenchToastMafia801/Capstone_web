<?php
echo "Name entered by the user was " .$_POST['first']. "<br>"; 
//super global array captures all form elements submitted using method post, specified by ['name of form element'] if desired
echo "Password entered by the user was " .$_POST['password']. "<br>"; 
echo "Age entered by the user was " .$_POST['agerange']. "<br>"; 

//To deal with the listbox, first, we will count the number of checks made
$noOfChecks = count($_POST['visit']);

//$i++ is equivalent to writing $i=$i+1
	for($i=0; $i<$noOfChecks; $i++)
	{
	if ($i == 0) {echo "Place(s) the user would like to visit: " ;}
	echo $_POST['visit'][$i];
	if($i == $noOfChecks -1){echo ".";} else {echo ", ";}
	
	}
/*
1st part of for loop is initialization of a variable
2nd part is the condition
3rd part is the increment or decrement
When compiler reaches for loop for the first time, it checks the initialized variable, then checks the condition. If condition holds then it enters the statement block. After running all statements in the statement block, compiler looks at the 3rd part of for loop which is increment. And increases the value of $i by 1 in this case. Then compiler again checks the condition, and so on..
*/

?>