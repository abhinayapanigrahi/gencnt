<?php
require_once("include/config.php");
require_once("objectManagers/userLoginManager.php");
require_once("process/servicesMgt.php");

$obj_services  = new servicesProcessor();
$resServicesList = $obj_services->getServedDetails("",$arrDBTaskManagement);
$resServiceRequest = $obj_services->getAllServiceRequests("",$arrDBTaskManagement);
$tempArr = array();
$tempArr2 = array();
while($objServicesList = mysql_fetch_object($resServicesList)){
	array_push($tempArr, $objServicesList);
}
$jsonServices = json_encode($tempArr);

while($objServicesList2 = mysql_fetch_object($resServiceRequest)){
	array_push($tempArr2, $objServicesList2);
}
$jsonServices2 = json_encode($tempArr2);
?>
<script>
	var allServiceStausListJSON = {"serviceStatusList":<?php echo $jsonServices; ?>};
	var allServiceRequestListJSON = {"serviceRequestList":<?php echo $jsonServices2; ?>};
	

</script>