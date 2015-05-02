<?php
require_once("../../include/config.php");
require_once("../../objectManagers/stateManager.php");
require_once("../../process/stateMgt.php");

$objStateProc = new statesProcessor();
	
if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{
	$countryID 	= $_POST['selectcountry'];
	$stateID 	= $_POST['selectState'];
	$stateName	= $_POST['stateName']; 
	$act = "";

	$replace_arr = array("#","/","\/","=",">","<","!","&","(",")");
	$stateName = str_replace($replace_arr,"",$stateName);

	$objStateMngr = new stateManager();
	
		$objStateMngr->setCountryId($countryID);
		$objStateMngr->setStateName($stateName);	
	if(!empty($stateID)){
		$objStateMngr->setStateId($stateID);
		$act = 'u';
		$objStateProc->updateState($objStateMngr,$arrDBTaskManagement);
	}else{
		$act = 'a';	
		$stateID = $objStateProc->addNewState($objStateMngr,$arrDBTaskManagement);
	}

	
		header("location: ../../manageMasters.php?mpg=stt&msg=".$act."&cntyr=".$countryID."&stid=".$stateID);
	
}
?>