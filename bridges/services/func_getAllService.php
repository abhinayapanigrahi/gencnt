<?php
require_once("include/config.php");
require_once("objectManagers/userLoginManager.php");
require_once("process/servicesMgt.php");

$obj_services  = new servicesProcessor();
$resServicesList = $obj_services->getAllServices("",$arrDBTaskManagement);
$tempArr = array();
while($objServicesList = mysql_fetch_object($resServicesList)){
	array_push($tempArr, $objServicesList);
}
echo $jsonServices = json_encode($tempArr);

?>