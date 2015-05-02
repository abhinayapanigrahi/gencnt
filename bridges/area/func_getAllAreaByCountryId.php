<?php
require_once("../../include/config.php");
require_once("../../objectManagers/areaManager.php");
require_once("../../process/areaMgt.php");

$cityId=$_REQUEST["cityid"];
					
	$objAreaProc = new areaProcessor();					
	$resAreaList = $objAreaProc->getAreasByCityId($cityId,$arrDBTaskManagement);

	$tempArr = array();
	while($objAreaList = mysql_fetch_assoc($resAreaList)){
		array_push($tempArr, $objAreaList);
	}
	echo $jsonServices = json_encode($tempArr);

?>