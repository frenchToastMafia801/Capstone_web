

<html>
<form enctype="multipart/form-data" action="processUpload.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
//typically use hidden to pass tokens or to store information in a file
//You can force a file size check you can enforce a client-side validation. You can also force a server-side validation.
Upload file: <input type="file" name="uploadedFile">
<input type="submit" value="Go">
</form>
</html>



include("verify.php");

//get userId from the session

$target_path = "uploads/".$userId."".jpg";
$providedFileName= basename($_FILES["uploadedFile"]["name"]);
$target_path = "uploads/$providedFileName";


?>