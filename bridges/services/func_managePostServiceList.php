<?php
require_once("../../include/config.php");
require_once("../../objectManagers/serviceManager.php");
require_once("../../process/servicesMgt.php");

$obj_services  = new servicesProcessor();
$objServMngr = new postServiceManager();

			$psID 		= $_REQUEST['psID'];
			$sID 		= $_REQUEST['sID'];
			$sPrice		= $_REQUEST['servicePrice'];
			$sUnit		= $_REQUEST['serviceUnit'];
			$sTime		= $_REQUEST['serviceTime'];
			$sComent	= $_REQUEST['serviceComment'];
			
			

	$objServMngr->setPostedServiceID($psID);
	$objServMngr->setServiceID($sID);
	$objServMngr->setServicePrice($sPrice);
	$objServMngr->setServiceUnit($sUnit);
	$objServMngr->setServiceTime($sTime);
	$objServMngr->setServiceComment($sComent);
	
	$obj_services->updatePostedServiceList($objServMngr,$arrDBTaskManagement);
	
	/*$resPostedServiceDtail = $obj_services->getPostedServiceDetails($objServMngr,$arrDBTaskManagement);
	
	$objPostedServiceDtail = mysql_fetch_object($resPostedServiceDtail);
	echo $jsonServices = json_encode($objPostedServiceDtail);
	*/
?>