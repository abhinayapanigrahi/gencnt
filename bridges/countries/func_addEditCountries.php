<?php
require_once("../../include/config.php");
require_once("../../objectManagers/countryManager.php");
require_once("../../process/countryMgt.php");

$objCountryProc = new countriesProcessor();
	
if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{
	$countryName 	= $_POST['addCountry'];
	$countryShortName 	= $_POST['addCountryShortName'];
	$hdnCountryID	= isset($_POST['selectcountry'])?$_POST['selectcountry']:""; 

	$replace_arr = array("#","/","\/","=",">","<","!","&","(",")");
	$countryName = str_replace($replace_arr,"",$countryName);
	$countryShortName = str_replace($replace_arr,"",$countryShortName);
	$objCountryMngr = new countryManager();
	
	$objCountryMngr->setCountryName($countryName);
	$objCountryMngr->setCountryShortName($countryShortName);
	
	$returnStatus="";
	
	if($hdnCountryID != ""){
		$objCountryMngr->setCountryId($hdnCountryID);		
		$returnStatus = $objCountryProc->updateCountry($objCountryMngr,$arrDBTaskManagement);
	}else
	{
		$returnStatus = $objCountryProc->addNewCountry($objCountryMngr,$arrDBTaskManagement);
	}
	$arrDBTaskManagement["getArr"] = 1;
	$countryList = $objCountryProc->getAllCountries($arrDBTaskManagement);
//	exit;
//			header("location: ../../manageMasters.php?mpg=cnt");
	$jsonCoutryList = json_encode(array("addCountry"=>$countryName,"addCountryShortName"=>$countryShortName,"selectcountry"=>$hdnCountryID,"countryList"=>$countryList));
}
?>
<script>
	var formloadedObject = {formAction:"countryMgt",resultCallBack:<?php echo $jsonCoutryList; ?>};
	window.top.formloadComplete(formloadedObject);
</script>