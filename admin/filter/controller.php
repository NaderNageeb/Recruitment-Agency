
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

	 $conn = mysqli_connect("localhost", "root", "", "erisdb");


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'approve' :
	doapprove();
	break;
	
	// case 'edit' :
	// doEdit();
	// break;
	
	// case 'delete' :
	// doDelete();
	// break;

 
	}


    function doapprove(){
		global $conn;
if(isset($_POST['approve'])){

$all_id = $_POST['job_id'];
$extract_id = implode(',' , $all_id);
// echo $extract_id;

$sqli = "UPDATE `tbljobregistration` SET `admin_app_1` = 1 where REGISTRATIONID IN($extract_id)  ";
$query = mysqli_query($conn,$sqli);
if($query){

	?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Approved Successfully</strong>
</div>


<?php

}else{
	echo"NOOO";
}



}

}


function filtering($COMPANYID,$job,$DEGREE,$EX){

	global $conn;

if($COMPANYID !='' && $job!='' && $DEGREE !='' && $EX!='' ){
$sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j2.`JOBID`= $job and a.`DEGREE` = '$DEGREE' and a.EXPERINCE = '$EX' and c.COMPANYID = $COMPANYID and j.admin_app_1 = 0 ";
}
if($COMPANYID !='' && $job=='' && $DEGREE =='' && $EX=='' ){
	$sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and  c.COMPANYID = $COMPANYID and j.admin_app_1 = 0 ";
}

if($COMPANYID =='' && $job !='' && $DEGREE =='' && $EX =='' ){
	$sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j2.`JOBID`= $job and j.admin_app_1 = 0 ";
}

if($COMPANYID =='' && $job=='' && $DEGREE !='' && $EX=='' ){
	$sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and a.`DEGREE` = '$DEGREE' and j.admin_app_1 = 0 ";
}

if($COMPANYID =='' && $job =='' && $DEGREE =='' && $EX !='' ){
	$sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and a.EXPERINCE = '$EX' and j.admin_app_1 = 0 ";
}

	if($query = mysqli_query($conn,$sql))
	{
	return $query;	
	}
else
	{
		echo "<script>alert('No Data For This Search');window.location = 'index.php';</script>";
		exit;
	}

}




















         




    ?>






<?php
/**
* Description:	This is a class for member.
* Author:		Joken Villanueva
* Date Created:	Nov. 2, 2013
* Revised By:		
*/

require_once(LIB_PATH.DS.'database.php');
class Room{
	
	protected static $tbl_name = "tbljobregistration";
	function db_fields(){
		global $mydb;
		return $mydb->getFieldsOnOneTable(self::$tbl_name);
	}


	public function approve($id=0) {
		global $mydb;
		  $sql = "UPDATE ".self::$tbl_name;
          $sql = " SET admin_app_1=". 1;
		  $sql .= " WHERE REGISTRATIONID =". $id;
		  $sql .= " LIMIT 1 ";
		  $mydb->setQuery($sql);
		  
			if(!$mydb->executeQuery()) return false; 	
	
	}
		
}
?>