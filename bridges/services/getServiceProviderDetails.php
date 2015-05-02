<?php
require_once("../../include/config.php");
require_once("../../objectManagers/serviceManager.php");
require_once("../../process/servicesMgt.php");

$obj_services  = new servicesProcessor();
$objMngr = new serviceManager();

$postedServiceID = $_REQUEST['psid'];

	$objMngr->setServiceID($postedServiceID);
		
	$arrPostedServiceDtail = $obj_services->getPostedServiceProviderDetails($objMngr,$arrDBTaskManagement);

	echo $jsonServices = json_encode($arrPostedServiceDtail);
	
?>