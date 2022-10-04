


<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

	 $conn = mysqli_connect("localhost", "root", "", "erisdb");


// $action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

// switch ($action) {
// 	case 'search' :
// 	dosearch();
// 	break;
	
// 	// case 'edit' :
// 	// doEdit();
// 	// break;
	
// 	// case 'delete' :
// 	// doDelete();
// 	// break;

 
// 	}







function search($date,$status,$name,$COMPANYID,$job_id,$date2){
global $conn;

if($status !='' && $date !='' && $name !='' && $COMPANYID !='' && $job_id !='' && $date2 ==''){
    $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE a.FNAME LIKE '%$name%' and c.COMPANYID = $COMPANYID and j2.JOBID = $job_id   and c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.`PENDINGAPPLICATION`= $status and j.REGISTRATIONDATE = '{$date}' " ;
         }if($status !='' && $date=='' && $name =='' && $COMPANYID =='' && $job_id =='' && $date2 ==''){
    $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.`admin_app_1`= $status " ;     
}

if($status =='' && $date !='' && $name =='' && $COMPANYID =='' && $job_id =='' && $date2 ==''){
$sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.REGISTRATIONDATE = '{$date}' " ;
}

if($status =='' && $date =='' && $name =='' && $COMPANYID =='' && $job_id =='' && $date2 !=''){
     $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.REGISTRATIONDATE = '{$date2}' " ;
     }
 if($status =='' && $date !='' && $name =='' && $COMPANYID =='' && $job_id =='' && $date2 !=''){
  $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.REGISTRATIONDATE BETWEEN '{$date}' AND '{$date2}' " ;
  }

     if($status =='' && $date =='' && $name !='' && $COMPANYID =='' && $job_id =='' && $date2 ==''){
    $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and a.FNAME LIKE '%$name%' " ;
         }if($status =='' && $date =='' && $name =='' && $COMPANYID !='' && $job_id =='' && $date2 ==''){
    $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and c.COMPANYID = $COMPANYID " ;
         }if($status =='' && $date =='' && $name =='' && $COMPANYID =='' && $job_id !='' && $date2 ==''){
    $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j2.JOBID = $job_id " ;
         }
        

if($query = mysqli_query($conn,$sql))
	{
	return $query;	
	}
else
	{
		echo "<script>alert('No Data Selected');window.location = 'index.php';</script>";
		exit;
	}

}





    ?>