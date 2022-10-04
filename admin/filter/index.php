<?php
require_once("../../include/initialize.php");
 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Filtering"; 
 $header=$view; 
switch ($view) {
	case 'filter' :
		$content    = 'filtering.php';		
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
		$content    = 'filtering.php';		
}
require_once ("../theme/templates.php");
?>
  
