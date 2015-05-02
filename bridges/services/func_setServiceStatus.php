<?php
require_once("../../include/config.php");
require_once("../../objectManagers/serviceManager.php");
require_once("../../process/servicesMgt.php");

$obj_services  = new servicesProcessor();
$objMngr = new serviceManager();

$serviceID = $_REQUEST['id'];
$status = $_REQUEST['status'];

	$objMngr->setServiceID($serviceID);
	$objMngr->setStatus($status);
	$obj_services->updatePostedServiceStatus($objMngr,$arrDBTaskManagement);
	
	$resPostedServiceDtail = $obj_services->getPostedServiceDetails($objMngr,$arrDBTaskManagement);
	
	$objPostedServiceDtail = mysql_fetch_object($resPostedServiceDtail);
	echo $jsonServices = json_encode($objPostedServiceDtail);
	
?>