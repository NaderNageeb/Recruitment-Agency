<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>ERS</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<?php include('./inc/header.php'); ?>
        <!-- /top navigation -->
<?php
//ini_set('display_errors', 1);
  
  
    
function GetStatuses($index){


return "Offline";
}

$success_msg='';
$error = 0;
$error_msg = '';

$student_index_no=''; 
$faculty_code= '';
$major_code= '';
$batch = '';
$acad_year=''; 
$semester=''; 

if (isset($_POST['submit']) or isset($_POST['off'])  or isset($_POST['onln']) or isset($_POST['change']) ) {

$student_index_no = $_POST['student_index_no']; 
$faculty_code = $_POST['faculty_code'];
$major_code   = $_POST['major_code'];
$batch      = $_POST['batch'];
$acad_year  = $_POST['acad_year']; 
$semester   = $_POST['semester']; 

if ($student_index_no == '') 
if( strlen(trim($batch))==0 or strlen(trim($acad_year))==0  or strlen(trim($semester))==0){
 $error_msg = "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                  <strong>Erorr!</strong> Batch, academic year and semester must be selected</div>";
$error=1;
}
 
}
$departments = get_departments();   
$batches = get_batches();
?>
        <!-- page content -->
        <div class="right_col" >
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student<small>Fee Details</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br /><?php if(isset($_SESSION['admin'])){?>
                    <form name="myform" method="post" action="<?=$_SERVER['PHP_SELF']?>" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Index<span class="required"></span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input name="student_index_no" type="text" id="student_index_no" value="<?=$student_index_no?>" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="last-name">Faculty<span class="required"></span>
                        </label>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                          <select name="faculty_code" id="faculty_code" onchange="getMajorList(this.value)" class="select2_group form-control">
                             <option value="">Select</option>
      <?php 
	
	  
		$f_arr=get_Myfaculties();
	  	foreach ($f_arr as $f_code=>$f_name) {	
		 
			$selected='';
		    if ($f_code == $faculty_code ) 
				$selected = 'Selected'; 
			echo '<option value="'.$f_code.'" '.$selected.'>'.$f_name.'</option>'; 
	 
	  }	
	  ?>
                          </select></div>
                          <label for="middle-name" class="control-label col-md-1 col-sm-1 col-xs-12">Major</label>
                                             <div class="col-md-2 col-sm-2 col-xs-12">
                          <select name="major_code" id="major_code" class="select2_group form-control">
                            <option value="">Select Major</option>
      <?php 
		
		$m_arr = get_majors($faculty_code);
		
	  	foreach ($m_arr as $m_code=>$m_name) {	
			$selected='';
		    if ($m_code == $major_code ) 
				$selected = 'Selected'; 
			echo '<option value="'.$m_code.'" '.$selected.'>'.$m_name.'</option>'; 
	  }	
	  ?>
                          </select>
                        
                        </div>
                      </div>
        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Batch</label>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                          <select name="batch" id="batch" class="select2_group form-control">
                             <option value="">Select</option>
      <?php
	  	foreach ($batches as $batch_item) {
			$selected='';
		    if ($batch_item['batch'] == $batch ) 
				$selected = 'Selected'; 
			echo '<option value="'.$batch_item['batch'].'" '.$selected.'>'.$batch_item['batch'].'</option>'; 
	  }	
	  ?>
                          </select>
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">Acad. Year<span class="required"></span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <select name="acad_year" id="acad_year" class="select2_group form-control">
                            <option value="">Select</option>
      <?php 
		
		
	  	foreach ($batches as $batch_item) {	
			$selected='';
		    if ($batch_item['batch'] == $acad_year ) 
				$selected = 'Selected'; 
			echo '<option value="'.$batch_item['batch'].'" '.$selected.'>'.$batch_item['batch'].'</option>'; 
	  }	
	  ?>
                          </select>
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">Semester<span class="required"></span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <select name="semester" id="semester" class="select2_group form-control">
     <option value="">Select</option>
      <?php 
		
		
	  	foreach ($semesters as $sem) {	
			$selected='';
		    if ($sem == $semester ) 
				$selected = 'Selected'; 
			echo '<option value="'.$sem.'" '.$selected.'>'.$sem.'</option>'; 
	  }	
	  ?>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button name="submit" type="submit" id="submit" class="btn btn-info">search</button>
                            <?php if (strtolower($_SESSION['user_type']) == 'admin')   { ?>
                          <button name="onln" type="submit" id="onln" class="btn btn-success">online</button>
                          <button name="off" type="submit" id="off" class="btn btn-danger">offline</button>
                            <?php }?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Fee<small>Report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    
					
                    <table id="datatable-responsive" class="report" cellspacing="0" width="100%">
                      <thead>
                       <tr>
                           <th>Ser. no.</th>
                           <th>Student Index</th>
                           <th>Student Name</th>
                           <th>Faculty/Major</th>
                           <th>Batch</th>
                           <th>Acd. Status</th>
                           <th>Tuition Fee</th>
                           <th>Reg Fee</th>
                           <th>Discount (%)</th>
                           <th>Late Reg Fee</th>
                           <th>Total Amount</th>
                           <th>Currency</th>
                           <!--<th><strong>Bank Fee</strong></th>
                           <th><strong> Update Status</strong></th>-->
                           <th>Reg Status</th>
                           <th>Start Date</th>
                           <th>End Date</th>
                        <?php if(($_SESSION['user_type']) == 'admin' or ($_SESSION['user_type']) == 'faculty registrar'){?><th>Change Date</th><?php }?>
                          </tr>
                      </thead>
                      <tbody>

                          <?php
   $count=1; 
   $search_where='';
   $total_sdg = 0.0 ; 
   $total_discount_sdg=0.0;
   $total_after_discount_sdg=0.0; 
   $total_amount_sdg=0.0;
   
   $total_usd = 0.0 ; 
   $total_discount_usd=0.0;
   $total_after_discount_usd=0.0; 
   $total_amount_usd=0.0;
   $curr_total_amount = 0.0; 
   


//Change to online and offline indivadually
if(isset($_POST['change']))
{
	if($_POST['view_data'] == 0)
	{
		$stu_id = $_POST['stu_id'];
		$change_online_update = "update fu_student_fee_fib_flag_local set viewData = 1 where student_index_no = '".$stu_id."' ";
		$change_query = mysql_query($change_online_update);
	}
	elseif($_POST['view_data'] == 1)
	{
		$stu_id = $_POST['stu_id'];
		$change_offline_update = "update fu_student_fee_fib_flag_local set viewData = 0 where student_index_no = '".$stu_id."' ";
		$change_query = mysql_query($change_offline_update);
	}
	if($change_query)
	{
		echo "<center><div class='alert alert-success alert-dismissible fade in' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                  <strong>Success!</strong><br>Changed Successfully</div></center>";	
	}
	else
	{
		echo "<center><div class='alert alert-danger alert-dismissible fade in' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                  <strong>Error!</strong><br>Problem</div></center>";	
	}
}   
   
   
   
   
   
   
 
if( (isset($_POST['off']))  or (isset($_POST['onln'])))	   {
	
	   if(isset($_POST['off']))
	   $flag='3';
	   else
	   $flag='1';
	   
	   $student_index_no='';
	   $f_code=$_POST['faculty_code'];
	   $faculty_code=$_POST['faculty_code'];
		   
	   $m_code=$_POST['major_code'];
	   $major_code=$_POST['major_code'];
	   
	   $batch_item=$_POST['batch'];
	   $sem=$_POST['semester'];
	   $acad_year=$_POST['acad_year'];
	   
	   if(isset($_POST['off'])){$msg=QeryDataOffline($student_index_no,$faculty_code,$m_code,$batch_item,$sem,$acad_year,$flag);}
	   elseif(isset($_POST['onln'])){$msg=QeryDataOnline($student_index_no,$faculty_code,$m_code,$batch_item,$sem,$acad_year,$flag);}
	   
	   }
	   
	   
	if ($error == 0 and ( isset($_POST['submit']) or isset($_POST['onln']) or isset($_POST['off']) or  isset($_POST['change'])) )
	{
		
		//$search_where = " dept='$dept_code' and batch='$batch' and academic_year='$acad_year' and  semester ='$semester' "; 
		if ( trim($student_index_no) != '' ) 
			$search_where = "A.student_index_no='$student_index_no' ";
		if ($faculty_code != '' ) 
			$search_where .= "and A.faculty_code = '$faculty_code' ";
		if ( $major_code !='' ) 
			$search_where .= "and A.major_code = '$major_code' ";
		if ( trim($batch) != '' ) 
			$search_where .= "and trim(A.batch) = '$batch' ";
		if ( trim($acad_year) != '' ) 
			$search_where .= "and trim(A.academic_year) = '$acad_year' ";
		if ( trim($semester) != '' ) 
			$search_where .= "and trim(A.semester) = '$semester' ";
				
		
		$search_where = trim($search_where, " "); 
        $search_where = trim($search_where, "and");
					
	      $sql = " Select  A.*,B.viewData as viewData , B.update_flag, B.date as bank_last_update_date, B.total_fee_bank, B.start_date, B.end_date 
				 from fu_student_fee_fib_latest A, fu_student_fee_fib_flag_local B
                 where A.student_index_no=B.student_index_no and $search_where  order by semester Desc" ;
		

        $rs = $db_fibfu->Execute($sql);
		$rs_arr = $rs->GetArray();
		
		/*if ($_SESSION['user_type'] == 'admin'){
            echo $sql ;
			echo "<pre>";
			print_r($rs_arr);
			echo "</pre>";
			}*/
	 
	 	if ( $rs->RecordCount() ==0 ) 
			echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                  <strong>Erorr!</strong> Fee setup not done yet for this batch and academic year </div></center>'; 
		        
        foreach ($rs_arr as $rec)
		{
        
		 if ( !in_array(trim($rec['status']), $status_block_arr ) or $rec['repeater'] == 1 or $rec['allow_register']==1 or
                   $rec['allow_late_register'] == 1 or $rec['cgpa'] >= 1.96) {
  		   $sfid  = $rec['student_fee_id']; 
		
          $total_fee = 0;
          $current_fee = 0;
          $discount_amount = ($rec['fee_year'] * $rec['discount'])/100;
          if ( $discount_amount > 0 )
              $total_fee = ($rec['fee_year']-$discount_amount) + $rec['fee_semester'] + $rec['fee_late_reg'] ;
          else
              $total_fee = $rec['fee_year'] + $rec['fee_semester'] + $rec['fee_late_reg'] ;
          $current_fee = $total_fee ;
          
  if ( $rec['currency'] == 'SDG' )
          {
            
			$total_sdg += $total_fee ;
          }
          if ( $rec['currency'] == 'USD' )
          {
			$total_usd += $total_fee ;
          }

          
		  $bank_last_update_date = $rec['bank_last_update_date'];
		  
		  $faculty = mysql_fetch_array(mysql_query("select * from faculty where faculty_code = '".$rec['faculty_code']."'"));
		  $major = mysql_fetch_array(mysql_query("select * from major where major_code = '".$rec['major_code']."'"));
		  $today = date('Y-m-d');
		  
		  //ICDL Check $icdl_other = GetICDLFees($faculty_code,$CurrentSem,$Batch,$currency);
		  $icdl_other = GetICDLFees($rec['faculty_code'],$rec['semester'],$rec['batch'],$rec['currency']);
		  if($icdl_other > 0)
		  {
			  
			  $icdl_check = mysql_query("select * from student_icdl where studet_index = '{$rec['student_index_no']}'");
			  if(mysql_num_rows($icdl_check))
			  {
				  $icdl_res = 0;  
			  }
			  else
		  	  {
				  $icdl_res = $icdl_other;    
			  }
		  }
		  else
		  {
			 $icdl_res = 0;  
		  }
		  
		
  ?>

  
                        <tr>
                          
    <td ><?=$count?></td>
    <td ><?=$rec['student_index_no']?></td>
    <td ><?=$rec['student_name_en']?></td>
    <td ><?php echo $major['major_desc_e'];?></td>
    <td ><?php echo $rec['batch'];?></td>
    <td ><?=$rec['status']?></td>
    <td ><?=$rec['fee_year']?></td>
    <td ><?=$rec['fee_semester']?></td>
    <td ><?=$rec['discount']?></td>
    <td ><?=$rec['fee_late_reg']?></td>
    <td >
    <?php

    //$rec['total_fee']

    if ( $rec['currency'] == 'USD' )
    {
$total_usd_new += $total_fee ;
echo $total_usd_new ;
    }
    else
    {
      echo $rec['total_fee'] ;
    }
    ?>
    </td>
    <td><?=$rec['currency']?></td>
    
        <?php $viewData=$rec['viewData'];?>
	<?php if($viewData == 1){?><td width="6%" style="background-color:#9BE699; color:#FFF; font-weight:bold" align="center"><?php }?>
    <?php if($viewData == 0 or $viewData == 3){?><td width="6%" style="background-color:#FD6460; color:#FFF; font-weight:bold" align="center"><?php }?>
    <?php if($viewData == 2){?><td width="6%" style="color:#090; font-weight:bold" align="center"><?php }?>
	<?php echo $stusesArr[$viewData] ;
		  if($viewData == 3){ echo "Offline";}
	?>

	
    <?php if(($_SESSION['user_type']) == 'admin' or ($_SESSION['user_type']) == 'faculty registrar'){?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    		<input type="hidden" name="student_index_no" value="<?php echo $student_index_no; ?>" />
            <input type="hidden" name="faculty_code" value="<?php echo $faculty_code; ?>" />
			<input type="hidden" name="major_code" value="<?php echo $major_code; ?>" />
			<input type="hidden" name="batch" value="<?php echo $batch; ?>" />
			<input type="hidden" name="acad_year" value="<?php echo $acad_year; ?>" />
			<input type="hidden" name="semester" value="<?php echo $semester; ?>" />
   

		<?php if($rec['viewData']==0 or $rec['viewData']==3) {?>
        	<center>
        	<input type="hidden" name="stu_id" value="<?php echo $rec['student_index_no'];?>" />
        	<input type="hidden" name="view_data" value="0" />
    		<input type="submit" name="change" id="change" value="Make Online"  class="btn btn-success" />
            </center>
		<?php }
			elseif($rec['viewData']==1) {?>
            <center>
            <input type="hidden" name="stu_id" value="<?php echo $rec['student_index_no'];?>" />
        	<input type="hidden" name="view_data" value="1" />
    		<input type="submit" name="change" id="change" value="Make Offline" class="btn btn-success"/>
            </center>
		<?php }
			elseif($rec['viewData']==2 and $_SESSION['user_type'] == 'admin') {?>
            <center>
            <input type="hidden" name="stu_id" value="<?php echo $rec['student_index_no'];?>" />
        	<input type="hidden" name="view_data" value="0" />
    		<input type="submit" name="change" id="change" value="Make Online" class="btn btn-success" />
            </center>
      
        <?php }?>
        </form>
                            </td>
													 <?php if($viewData == 2){?>
    <td style="color:#090; font-weight:bold" align="center"><?php }else{?>
    							   <?php if($rec['start_date'] <= $today && $rec['end_date'] >= $today){?>
    <td style="background-color:#9BE699; color:#FFF; font-weight:bold" align="center"><?php }?>
    							<?php if(!($rec['start_date'] <= $today && $rec['end_date'] >= $today)){?>
    <td style="background-color:#FD6460; color:#FFF; font-weight:bold" align="center"><?php }}?>
    												 
		<?php if($viewData != 2){echo $rec['start_date'];}else echo "-";?>
    </td>
    							   					 <?php if($viewData == 2){?>
    <td style="color:#090; font-weight:bold" align="center"><?php }else{?>
								   <?php if($rec['start_date'] <= $today && $rec['end_date'] >= $today){?>
    <td style="background-color:#9BE699; color:#FFF; font-weight:bold" align="center"><?php }?>
    							<?php if(!($rec['start_date'] <= $today && $rec['end_date'] >= $today)){?>
    <td style="background-color:#FD6460; color:#FFF; font-weight:bold" align="center"><?php }}?>
    												 
		<?php if($viewData != 2){echo $rec['end_date'];}else echo "-";?>
    </td>
    <?php if(($_SESSION['user_type']) == 'admin' or ($_SESSION['user_type']) == 'faculty registrar'){?>
    <td  align="center">
    <?php if((!($rec['start_date'] <= $today && $rec['end_date'] >= $today)) and $viewData != 2){?>
        	<center>
            <a href="change_registration_date.php?index=<?php echo $rec['student_index_no'];?>" target="_blank">
                <button type="button" class="btn btn-dark">Change</button></a>
            </center>
    <?php }
	else{echo "-";}
	?>
    </td>
     <?php }?>
                        </tr>
                          
					<?php  
  $count++;
  }
        }// if block status check close 
  }
  ?>


<?php
} else { //session admin if
?>
</table>
                      </tbody>
                    



<?php }
                                                             } 
                      ?>
					
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
        <!-- /page content -->

        <!-- footer content -->

      
        <!-- /footer content -->
    

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
              
         <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

          
  </body>

</html>
