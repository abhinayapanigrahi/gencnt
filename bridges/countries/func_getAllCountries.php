<?php
require_once("include/config.php");
require_once("objectManagers/countryManager.php");
require_once("process/countryMgt.php");

$obj_countryList  = new countriesProcessor();
$resCountryList = $obj_countryList->getAllCountries($arrDBTaskManagement);
$tempArr = array();
while($objCountryList = mysql_fetch_object($resCountryList)){
	array_push($tempArr, $objCountryList);
}
echo $jsonServices = json_encode($tempArr);

?>