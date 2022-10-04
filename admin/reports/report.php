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
                      "SECTOR_VACANCY">Applicant Name</label> 
                      <div class="col-md-8">
                        <input type="text"  name="applicant_name" class="form-control input-sm"  id=""  autocomplete=""></input> 
                      </div>
                    </div>
                  </div>   




 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "REQ_NO_EMPLOYEES">Applicant Status</label> 
                      <div class="col-md-8">
                      <select class="form-control input-sm" id="" name="status">
                          <option value="">Select</option>
                           <option value="0">Pending</option>
                           <option value="1">Approved</option>
                           <!-- <option value="0">Viewed By The Company</option> -->
                           <!-- <option>Male/Female</option> -->
                        </select>
                      </div>
                    </div>
                  </div> 

				  <div class="form-group">
                                <div class="col-md-8">
                                  <label class="col-md-4 control-label" for=
                                  "COMPANYNAME">Company Name:</label>

                                  <div class="col-md-8">
                                    <select class="form-control input-sm" id="COMPANYID" name="COMPANYID">
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
                      "REQ_NO_EMPLOYEES">job </label> 
					  <div class="col-md-8">
                <select class="form-control input-sm" id="" name="job">
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
					</div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SECTOR_VACANCY">Applied Date from</label> 
                      <div class="col-md-8">
                        <input type="date"  class="form-control input-sm"  id="" min="<?php echo date("2010-1-1");   ?>" name="date" autocomplete=""></input> 
                      </div>
                    </div>
                  </div>   

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SECTOR_VACANCY">Applied Date to</label> 
                      <div class="col-md-8">
                        <input type="date"  class="form-control input-sm"  id="" min="<?php echo date("2010-1-1");   ?>" name="date2" autocomplete=""></input> 
                      </div>
                    </div>
                  </div>   
 
 



                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" 
					  for="idno"></label>
                        

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
<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
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
								  $job_id = $_POST['job'];
								  $COMPANYID = $_POST['COMPANYID']; 
								  $name = $_POST['applicant_name'];
								  $status = $_POST['status'];
								  $date = $_POST['date'];
								  $date2 = $_POST['date2'];

								 if($status =='' && $date =='' && $name =='' && $COMPANYID =='' && $job_id =='' && $date2 =='' ){
					    echo "<script>alert('Nothing Selected');window.location = 'index.php' ;</script>";
              exit;
								 }else{
                  $search = search($date,$status,$name,$COMPANYID,$job_id,$date2);
                 }

              
                 while ($result = mysqli_fetch_array($search) ) {
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
							  		echo '<td>'. $result['APPLICANT'] .'</td>';
							  		echo '<td>' . $result['OCCUPATIONTITLE'].'</a></td>';
							  		echo '<td>' . $result['COMPANYNAME'].'</a></td>'; 
							  		echo '<td>'. $result['REGISTRATIONDATE'].'</td>';
							  		echo '<td>'. $result['REMARKS'].'</td>';  
					  				echo '<td align="center" >    
					  		     <a title="View" href="index.php?view=view&id='.$result['REGISTRATIONID'].'"  class="btn btn-info btn-xs  ">
					  		     <span class="fa fa-info fw-fa"></span> View</a> 
					  		            
					  					 </td>';
							  		echo '</tr>';
							  	} 
              
							  	?>
							  </tbody>
								
							</table>
 
							 
							</form>
							</div>
                 
 <?php  } ?>

 <?php if (isset($_REQUEST['search'])) {   ?>
<center><button id="toggleButton" onclick="printDiv('printMe');" class="btn btn-success active">Print Table</button></center>
<?php } ?>


 <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
  

	</script>