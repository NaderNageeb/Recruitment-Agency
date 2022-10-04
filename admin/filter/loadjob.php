<?php 
include('controller.php');


$COMPANYID = $_GET['COMPANYID'];

$query = mysqli_query($conn,"SELECT * FROM `tbljob` WHERE COMPANYID = {$COMPANYID}");
while($row = mysqli_fetch_array($query)) {
	echo "<option value='$row[JOBID]'>$row[CATEGORY]</option>";
}


?>

