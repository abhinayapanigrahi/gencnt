<?php
require_once("../../include/config.php");
require_once("../../objectManagers/cityManager.php");
require_once("../../process/cityMgt.php");

$countyID 	= (isset($_REQUEST['countryID']))?$_REQUEST['countryID']:'82';
$stateID 	= $_REQUEST['stateID'];

$objCityMngr = new cityManager();
$obj_cityList  = new cityProcessor();

if(!empty($stateID)){
	$objCityMngr->setStateId($stateID);
	$resCityList = $obj_cityList->getAllCitiesByState($objCityMngr,$arrDBTaskManagement);
}else{
	$objCityMngr->setCountryId($countyID);
	$resCityList = $obj_cityList->getAllCitiesByCountry($objCityMngr,$arrDBTaskManagement);
}


$tempArr = array();
while($objCityList = mysql_fetch_object($resCityList)){
	array_push($tempArr, $objCityList);
}
echo $jsonStates = json_encode($tempArr);

?>