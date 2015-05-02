<?php
require_once("../../include/config.php");
require_once("../../objectManagers/areaManager.php");
require_once("../../process/areaMgt.php");

$objAreaProc = new areaProcessor();
	
if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{
	
	$areaName 	= $_POST['txtAreaName'];
	$landmark 	= $_POST['txtLandmark'];
	$pincode 	= $_POST['txtPincode'];
	$cityId	= $_POST['selectCity']; 
	$areaId= $_POST['selectAreaId']; 

	$replace_arr = array("#","/","\/","=",">","<","!","&","(",")");
	$areaName = str_replace($replace_arr,"",$areaName);
	$landmark = str_replace($replace_arr,"",$landmark);
	$pincode = str_replace($replace_arr,"",$pincode);
		
	$objAreaMngr = new areaManager();
	
	$objAreaMngr->setAreaName($areaName);
	$objAreaMngr->setLandmark($landmark);
	$objAreaMngr->setPincode($pincode);
	
	if($countryID!="")
	{
		$objAreaMngr->setCityId($cityId);
	}
	
	
	$returnStatus="";
	
	if(!empty($areaId)){
		$objAreaMngr->setAreaId($areaId);		
		$returnStatus = $objAreaProc->updateArea($objAreaMngr,$arrDBTaskManagement);
	}
	else
	{
		$returnStatus = $objAreaProc->addNewArea($objAreaMngr,$arrDBTaskManagement);		
	}
	header("location:http://localhost:8080/genuineconnect/states.php");
}

?>
