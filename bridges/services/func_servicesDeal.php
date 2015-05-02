<?php
require_once("../../include/config.php");
require_once("../../objectManagers/serviceManager.php");
require_once("../../process/servicesMgt.php");

$obj_services  = new servicesProcessor();
$objSrviceMngr = new serviceManager();

$searchService 		= $_REQUEST['searchSevices'];
$isSubmit 			= $_REQUEST['isSearched'];

	if(isset($_REQUEST['searchBtn']) && isset($_REQUEST['isSearched']) && $_REQUEST['searchBtn'] == "SEARCH")
	{
		$objSrviceMngr->setSearchText($searchService);
		$res_service = $obj_services->searchServices($objSrviceMngr,$arrDBTaskManagement);
		//print_r($res_service);
	}
	$jsonServices = json_encode($res_service);
	
?>
<script>
	var formloadedObject = {formAction:"searchService",resultCallBack:<?php echo $jsonServices; ?>};
	window.top.formloadComplete(formloadedObject);
</script>