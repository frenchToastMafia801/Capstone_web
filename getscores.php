
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect("184.154.225.13", "compapp6_ftm", "Frenchtoastmafia21", "compapp6_capstone");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
	
	
}

/*mysqli_select_db($con,"ajax_demo");*/
$sql="SELECT scorelist.scores, scorelist.scoreMetric, k12student.studentId, assessment.assessmentName
FROM assessment INNER JOIN (assessmentregistration INNER JOIN (assessmentscoreset INNER JOIN (k12student INNER JOIN scorelist ON k12student.personId = scorelist.studentId) ON (k12student.personId = assessmentscoreset.studentId) AND (assessmentscoreset.assessmentScoreSetId = scorelist.assessmentScoreSetId)) ON (k12student.personId = assessmentregistration.studentId) AND (assessmentregistration.assessmentRegistrationId = assessmentscoreset.assessmentRegistrationId)) ON assessment.assessmentId = assessmentregistration.assessmentId
WHERE (((k12student.studentId)=".$q."))";
$result = mysqli_query($con,$sql);

$count = mysqli_num_rows($results);
					for ($i=0; $i<$count;$i++)
					{
					list($score, $scoreMetric, $studentId, $assessmentName) = mysqli_fetch_array($results);
					}
					
					
echo "<table>
<tr>
<th>score</th>
<th>scoreMetric</th>
<th>studentId</th>
<th>assessmentName</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $score . "</td>";
    echo "<td>" . $scoreMetric . "</td>";
    echo "<td>" . $studentId . "</td>";
    echo "<td>" . $assessmentName . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>