<?php
require_once("../../include/config.php");
require_once("../../objectManagers/enqueryManager.php");
require_once("../../process/enqueryMgr.php");

if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{	
	$name = $_POST['genContName'];
	$phone = $_POST['genContPhone'];
	$email = $_POST['genContEmail'];
	$title = $_POST['genContTitle'];
	$subject = $_POST['genContSub'];
	
	$replace_arr = array("#","/","\/","=",">","<","!","&","(",")");
	$name = str_replace($replace_arr,"",$name);
	$phone = str_replace($replace_arr,"",$phone);
	$email = str_replace($replace_arr,"",$email);
	$title = str_replace($replace_arr,"",$title);
	$subject = str_replace($replace_arr,"",$subject);
	
	$objEnqrMngr = new enqueryManager();
	
	$objEnqrMngr->setName($name);
	$objEnqrMngr->setPhone($phone);
	$objEnqrMngr->setEmail($email);
	$objEnqrMngr->setTitle($title);
	$objEnqrMngr->setSubject($subject);
	
	$objprocessEnqr = new enqueryProcessor();
	$objprocessEnqr->addNewQuery($objEnqrMngr,$arrDBTaskManagement);

}
?>