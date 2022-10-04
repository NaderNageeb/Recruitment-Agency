


<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['EMP_USERID'])){
      redirect(web_root."employees/index.php");
     }

	 $conn = mysqli_connect("localhost", "root", "", "erisdb");


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

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







function search($status,$applicant_name,$date,$job,$company_id,$date2){
global $conn;


if($status != ''  && $applicant_name != '' &&  $date != ''  && $job != '' &&  $date2 == ''){
    $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.`PENDINGAPPLICATION`= $status and a.FNAME = '$applicant_name' and j2.JOBID = $job and j.REGISTRATIONDATE = '{$date}' and j.`COMPANYID`= $company_id and j.admin_app_1 = 1 ";
       }
       if($status != ''  && $applicant_name == '' &&  $date == ''  && $job == '' &&  $date2 == ''){
        $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.`PENDINGAPPLICATION`= $status and j.`COMPANYID`= $company_id and j.admin_app_1 = 1 ";	
       }

       if($status == ''  && $applicant_name != '' &&  $date == ''  && $job == '' &&  $date2 == ''){
       $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and a.FNAME LIKE '%$applicant_name%' and j.`COMPANYID`= $company_id and j.admin_app_1 = 1 ";	
          }

       if($status == ''  && $applicant_name == '' &&  $date != ''  && $job == '' &&  $date2 == ''){
       $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.REGISTRATIONDATE = '{$date}' and j.`COMPANYID`= $company_id and j.admin_app_1 = 1 ";	
           }
       if($status == ''  && $applicant_name == '' &&  $date == ''  && $job != '' &&  $date2 == ''){
       $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j2.JOBID = $job and j.`COMPANYID`= $company_id and j.admin_app_1 = 1 ";	
           }
           if($status == ''  && $applicant_name == '' &&  $date == ''  && $job == '' &&  $date2 != ''){
            $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.REGISTRATIONDATE = '{$date2}' and j.`COMPANYID`= $company_id and j.admin_app_1 = 1 ";	
        }
        if($status == ''  && $applicant_name == '' &&  $date != ''  && $job == '' &&  $date2 != ''){
            $sql = "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j.REGISTRATIONDATE BETWEEN '{$date}' AND  '{$date2}' and j.`COMPANYID`= $company_id and j.admin_app_1 = 1 ";	
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