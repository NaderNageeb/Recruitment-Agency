<?php
require_once("../../include/initialize.php");
 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Reports"; 
 $header=$view; 
switch ($view) {
	case 'report' :
		$content    = 'report.php';		
		break;

	case 'view' :
		$content    = 'view.php';		
		break;

	// case 'edit' :
	// 	$content    = 'edit.php';		
	// 	break;
    // case 'view' :
	// 	$content    = 'view.php';		
	// 	break;

	default :
		$content    = 'report.php';		
}
require_once ("../theme/templates.php");
?>
  
