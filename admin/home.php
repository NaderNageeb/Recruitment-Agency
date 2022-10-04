
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php
    $conn = mysqli_connect("localhost", "root", "", "erisdb");
     $sql = "SELECT COUNT(COMPANYID) As c from tblcompany ";
    $query = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($query);
    $num_rows = $values['c'];
    echo $num_rows;              
              ?></h3>

              <p>COMPANYS</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
<?php
$conn = mysqli_connect("localhost", "root", "", "erisdb");
$sql = "SELECT COUNT(JOBID) As c from tbljob ";
$query = mysqli_query($conn, $sql);
$values = mysqli_fetch_assoc($query);
$num_rows = $values['c'];
echo $num_rows;              

?>              
              </h3> 
              <p>JOBS</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              <?php
$conn = mysqli_connect("localhost", "root", "", "erisdb");
$sql = "SELECT COUNT(REGISTRATIONID) As c from tbljobregistration ";
$query = mysqli_query($conn, $sql);
$values = mysqli_fetch_assoc($query);
$num_rows = $values['c'];
echo $num_rows;              

?>   

              </h3>

              <p>APPLICANTS</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              <?php
$conn = mysqli_connect("localhost", "root", "", "erisdb");
$sql = "SELECT COUNT(CATEGORYID) As c from tblcategory ";
$query = mysqli_query($conn, $sql);
$values = mysqli_fetch_assoc($query);
$num_rows = $values['c'];
echo $num_rows;              

?>   




              </h3> 
              <p>CATEGORYS</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
  