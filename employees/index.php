<?php 
require_once("../include/initialize.php");


 if(!isset($_SESSION['EMP_USERID'])){
    redirect(web_root."employees/login.php");
  }

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
  case '1' :
        // $title="Home"; 
    // $content='home.php'; 
    if ($_SESSION['EMP_ROLE']=='Cashier') {
        # code...
      redirect('orders/');

    } 
    if ($_SESSION['EMP_ROLE']=='Administrator') {
        # code... 

      redirect('meals/');

    } 
    break;  
  default :
 
      $title="Home"; 
    $content ='home.php';    
}
require_once("theme/templates.php");
?>