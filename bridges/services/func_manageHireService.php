<?php
require_once("../../include/config.php");
require_once("../../objectManagers/serviceManager.php");
require_once("../../process/servicesMgt.php");

$obj_services  = new servicesProcessor();
$objPostedServiceMngr = new postServiceManager();


$psID 		= $_REQUEST['hdn_psid'];
$isSubmit 			= $_REQUEST['isSubmit'];

	if($isSubmit){
		$objPostedServiceMngr->setPostedServiceID($psID);
		$objPostedServiceMngr->setServiceID($psID);
		
		$res_service = $obj_services->serviceDealConfirmaton($objPostedServiceMngr,$arrDBTaskManagement);
		//$res_service = $obj_services->getPostedServiceProviderDetails($objPostedServiceMngr,$arrDBTaskManagement);		
		
		//print_r($res_service);
	}
	$jsonServices = json_encode($res_service);
	
?>
<script>
	var formloadedObject = {formAction:"confirmDeal",resultCallBack:[]};
	window.top.formloadComplete(formloadedObject);
</script>