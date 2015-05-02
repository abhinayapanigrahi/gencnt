<?php
require_once("../../include/config.php");
require_once("../../objectManagers/stateManager.php");
require_once("../../process/stateMgt.php");

$countyID = (isset($_REQUEST['countryID']))?$_REQUEST['countryID']:'82';
$objStateMngr = new stateManager();
$objStateMngr->setCountryId($countyID);
$obj_stateList  = new statesProcessor();
$resStateList = $obj_stateList->getStateListForCountryID($objStateMngr,$arrDBTaskManagement);
$tempArr = array();
while($objStateList = mysql_fetch_object($resStateList)){
	array_push($tempArr, $objStateList);
}
echo $jsonStates = json_encode($tempArr);

?>