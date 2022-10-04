<?php include('controller.php');  ?>
<?php
     if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
     
?>
<!-- Depended Select -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    
	$("#COMPANYID").change(function() {
		// $(this).after('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" /></div>');
		$.get('loadjob.php?COMPANYID=' + $(this).val(), function(data) {
			$("#job").html(data);
			$('#loader').slideUp(200, function() {
				$(this).remove();
			});
		});	
    });

});
</script>

<!-- Depended Select -->


<?php
if(isset($_GET['approve'])){

$approve_id = $_GET['approve'];

$sqli = "UPDATE tbljobregistration SET admin_app_1 = 1 where REGISTRATIONID = $approve_id";

$query = mysqli_query($conn,$sqli);
if($query){
?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Approved Successfully</strong>
</div>


  <?php
}else{
  echo "NOOOO";
}



}


?>

<!-- muliple select -->
<?php
$all_id = '';
if(isset($_POST['approve'])){
  // echo "<script>alert('Wrong User Name Or Password');window.location = 'login.php';</script>";

  $all_id = $_POST['job_id'];
  if( $all_id == ''){

   echo "<script>alert('NO Applicants Selected');window.location = 'index.php';</script>";


   }else{
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
  // <!-- muliple select -->

?>















 <form class="form-horizontal span6" action="" method="POST">

<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">Search</h1>
    </div>
    <!-- /.col-lg-12 -->
 </div> 


 <div class="form-group">
                                <div class="col-md-8">
                                  <label class="col-md-4 control-label" for=
                                  "COMPANYNAME">Company Name:</label>

                                  <div class="col-md-8">
                                    <select class="form-control input-sm"  id="COMPANYID" name="COMPANYID">
                                      <option value="">Select</option>
                                      <?php 
                                        $sql ="Select * From tblcompany";
                                        $mydb->setQuery($sql);
                                        $res  = $mydb->loadResultList();
                                        foreach ($res as $row) {
                                          # code...
                                          echo '<option value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
                                        }

                                      ?>
                                    </select>
                                  </div>
                                </div>
                              </div>  

 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "REQ_NO_EMPLOYEES">Vacancys </label> 
					  <div class="col-md-8">
                <select  class="form-control input-sm" id="job" name="job">   </select>

              </div>
                    </div>

<div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "DEGREE">Educational Attainment:</label>
			    <div class="col-md-8">
			      <input name="deptid" type="hidden" value="">
			      <select  class="form-control input-sm" id="DEGREE" name="DEGREE" 
			             onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
					<option value="">Select Educational Attainment</option>
					<option value="High School">High School</option>
					<option value="Diploma">Diploma</option>
					<option value="Bachelor">Bachelor</option>
					<option value="Master">Master</option>
					<option value="PhD">PhD</option>
					</select>
			      </div>
			  </div>

        <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "EX">Years of Experience:</label> 
                      <div class="col-md-8">
                          <select class="form-control input-sm"  id="" name="EX">
                          <option value="">Select Years of Experience</option>
                          <?php
                          for ($i=0; $i < 50; $i++) { 
                            echo '<option value="'. $i .'">'.$i.'</option>';
                          }
                          
                          ?>
                           <!-- <option value="Male/Female">Male/Female</option> -->
                        </select>
                      </div>
                    </div>

					<!-- <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "REQ_NO_EMPLOYEES">Applicant Status</label> 

                      <div class="col-md-8">
                      <select class="form-control input-sm" id="" ="" name="status">
                          <option value="">Select</option>
                           <option value="1" >Pending</option>
                           <option value="0">Viewed By The Company</option>
                            <option>Male/Female</option> 
                        </select>
                      </div>
                    </div> -->



                  </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="search" type="submit" ><span class="fa-li fa fa-check-square"></span> Search</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 

 </form>



<?php        
if(isset($_POST['search'])){

?>
<br>
<br>
<br>
<div  id="printMe">
  <form action="" method="POST">
<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<th><button type="submit" class="btn btn-success btn-xs " name="approve"><span class="glyphicon glyphicon-ok"></span> Approve Selected</button>
</th>

									<th>Applicant</th>
									<th>Job Title</th>
									<th>Company</th>
									<th>Applied Date</th> 
									<th>Remarks</th>
									<th width="14%" >Action</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
                  $COMPANYID = $_POST['COMPANYID']; 
                  $job = $_POST['job'];
							  	 $DEGREE = $_POST['DEGREE'];
                   $EX = $_POST['EX'];
                   if($job =='' && $DEGREE =='' && $EX =='' && $COMPANYID ==''){
					    echo "<script>alert('Nothing Selected');window.location = 'index.php' ;</script>";
                   }else{
                    $filter = filtering($COMPANYID,$job,$DEGREE,$EX);
                   }

							  		
                  	// echo	$sqli= "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j2.`JOBID`= $job and a.`DEGREE` = '$DEGREE' and a.SEX = '$EX' ";
							  		// $query = mysqli_query($conn,$sqli);

									while($result = mysqli_fetch_array($filter)) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
                    ?>
<td width="10px"  ><input type="checkbox" name="job_id[]" value="<?php echo $result ['REGISTRATIONID']; ?>"> </td>
                  <?php
							  		echo '<td>'. $result['APPLICANT'].'</td>';
							  		echo '<td>' . $result['OCCUPATIONTITLE'].'</a></td>';
							  		echo '<td>' . $result['COMPANYNAME'].'</a></td>'; 
							  		echo '<td>'. $result ['REGISTRATIONDATE'].'</td>';
							  		echo '<td>'. $result ['REMARKS'].'</td>';  
					  				echo '<td align="center" >    
					  		             <a title="View" href="index.php?view=view&id='.$result['REGISTRATIONID'].'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-info fw-fa"></span> View</a> 	
                             

                             
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
              <?php
}
              ?>
 
							 
							</form>
							</div>
                 
 <?php  //} ?>
 <!-- <a title="Approve" href="index.php?approve=approve&approve='.$result->REGISTRATIONID.'"  class="btn btn-success btn-xs  ">
					  		             <span class="fa fa-info fw-fa"></span> Approve</a>  -->