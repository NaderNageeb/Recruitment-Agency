<?php include('controller.php');  ?>
<?php
     if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
     
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
                      "REQ_NO_EMPLOYEES">Vacancys </label> 
					  <div class="col-md-8">
                <select required class="form-control input-sm" id="" name="job">
                  <option value="">Select</option>
                  <?php 
              $sql ="Select * From tbljob";
              $mydb->setQuery($sql);
              $res  = $mydb->loadResultList();
              foreach ($res as $row) {
              # code...
              echo '<option value='.$row->JOBID.'>'.$row->OCCUPATIONTITLE.'</option>';
                            }

                      ?>
                 </select>
              </div>
                    </div>

<div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "DEGREE">Educational Attainment:</label>
			    <div class="col-md-8">
			      <input name="deptid" type="hidden" value="">
			      <select  class="form-control input-sm" id="DEGREE" name="DEGREE" 
			             onkeyup="javascript:capitalize(this.id, this.value);" required="required" autocomplete="off">
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
                      "PREFEREDSEX">Prefered Sex:</label> 
                      <div class="col-md-8">
                          <select class="form-control input-sm" required id="PREFEREDSEX" name="PREFEREDSEX">
                          <option value="">Select</option>
                           <option value="Male" >Male</option>
                           <option value="Female">Female</option>
                           <!-- <option value="Male/Female">Male/Female</option> -->
                        </select>
                      </div>
                    </div>

					<!-- <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "REQ_NO_EMPLOYEES">Applicant Status</label> 

                      <div class="col-md-8">
                      <select class="form-control input-sm" id="" required="required" name="status">
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
<form action="controller.php?action=approve" Method="POST">

<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<th><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> Applicant</th>
									
                  <th>Job Title</th>
									<th>Company</th>
									<th>Applied Date</th> 
									<th>Remarks</th>
									<th>Status</th>

									<th width="14%" >Action</th> 
							  	</tr>	
							  </thead> 
							  <tbody>

							  	<?php   
                  $job = $_POST['job'];
							  	 $DEGREE = $_POST['DEGREE'];
                   $PREFEREDSEX = $_POST['PREFEREDSEX'];
                   if($job !='' && $DEGREE !='' && $PREFEREDSEX !=''){
							  		$mydb->setQuery("SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j2.`JOBID`= $job and j2.`Job_DEGREE` = '$DEGREE' and a.SEX = '$PREFEREDSEX' ");
							  		$cur = $mydb->loadResultList();
                  	// echo	$sqli= "SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` and j2.`JOBID`= $job and j2.`Job_DEGREE` = '$DEGREE' and a.SEX = '$PREFEREDSEX' ";
							  		// $query = mysqli_query($conn,$sqli);
                  }

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
?>

				<td align="left"  width="120"><input type="checkbox" name="selector[]" id="selector[]" value="<?php echo  $result->REGISTRATIONID; ?>" /> 

<?php
							  		echo '<td>'. $result->APPLICANT.'</td>';
							  		echo '<td>' . $result->OCCUPATIONTITLE.'</a></td>';
							  		echo '<td>' . $result->COMPANYNAME.'</a></td>'; 
							  		echo '<td>'. $result->REGISTRATIONDATE.'</td>';
							  		echo '<td>'. $result->REMARKS.'</td>';  
					  				echo '<td align="center" >    
					  		             <a title="View" href="index.php?view=view&id='.$result->REGISTRATIONID.'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-info fw-fa"></span> View</a> 
					  		            
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
							 
							
							</div>
                 
 <?php   ?>

<center>
<button type="submit" class="btn btn-default" name="approve"><span class="glyphicon glyphicon-ok"></span> Approve Selected</button>
 </form>
<?php } ?>
