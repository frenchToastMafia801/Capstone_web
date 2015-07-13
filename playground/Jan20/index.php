This is a default file.
<html>
<head>
<title>Travel</title>
</head>
<body>
<h1>Travel</h1>
<form method="post" action="second.php">

<!---action defines where all these inputs go when you submit--->
<!---action indicating another page takes you to a new page-->
<!---if no file name is specified then the objects are returned to the same page--->


Username: 
<input type="text" name="username"><br />
Password:
<input type="password" name="password"><br />
First Name:
<input type="text" name="fname"><br />
Last Name:
<input type="text" name="lname"><br />
Website:
<input type="text" name="userurl"><br />
Gender:
Male<input type="radio" name="male" value="m"><br />
Female<input type="radio" name="female" value="f"><br />
Unspecified<input type="radio" name="unspgender" value="u"><br />

<!---if you dont specify a value for a radio button or checkbox, youll never know what they clicked.---->

Age range: <br />
<select name="agerange">
<option value="0-15">0-15</option>
<option value="16-30">16-30</option>
<option value="31-45"selected>31-45</option>
<option value="46-60">46-60</option>
<option value="61-75">61-75</option>
</select>

<!---To make a listbox you need to use the <select> and </select> tags and specify option values--> similar to UL and LI--->
<!---Add checked to the default option--->

Transportation: <br />
<select name="transp">
<option value="bike">bike</option>
<option value="car" checked="checked">car</option>
<option value="bus">bus</option>
</select>


Places Id like to visit: <br />
Bryce Canyon <input type="checkbox" name="visit[]" value="bryce"><br />
Zions National Park <input type="checkbox" name="visit[]" value="zion"><br />
Canyonlands National Park <input type="checkbox" name="visit[]" value="canyonlands"><br />
Monument Valley <input type="checkbox" name="visit[]" value="monument"><br />
Goblin Valley <input type="checkbox" name="visit[]" value="goblin"><br />

<input type="submit" value="Submit">


</form>
</body>
</html>
<? 