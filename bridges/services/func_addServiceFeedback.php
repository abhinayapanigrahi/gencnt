<?php
require_once("../../include/config.php");
require_once("../../objectManagers/serviceManager.php");
require_once("../../process/servicesMgt.php");

$objServiceProc = new servicesProcessor();
	
if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{
	$serviceFeedback 	= $_POST['rate_comment'];
	$rteSkill 			= $_POST['rate_skill'];
	$rateBehav			= $_POST['rate_behve'];
	$rateOverall		= $_POST['rate_overall'];
	$dealID				= $_POST['dealID'];	
	$psID				= $_POST['psID'];	
	$isCommentOnly 		= $_POST['commentOnly'];
	$isSrvicComent		= "";
	

	$replace_arr = array("#","/","\/","=",">","<","!","&","(",")");
	$serviceFeedback = str_replace($replace_arr,"",$serviceFeedback);

	$objServRateMngr = new serviceRatingManager();
	
	$objServRateMngr->setDealID($dealID);
	$objServRateMngr->setFeedback($serviceFeedback);
	$objServRateMngr->setPsID($psID);

	if($isCommentOnly){

		$objServRateMngr->setRate1($rteSkill);
		$objServRateMngr->setRate2($rateBehav);
		$objServRateMngr->setRate3($rateOverall);	

		$objServiceProc->addServiceFeedback($objServRateMngr,$arrDBTaskManagement);
		$isSrvicComent = "";

	}else{
		$objServiceProc->addServiceFeedbackComment($objServRateMngr,$arrDBTaskManagement);
		$isSrvicComent = "1";
	}

}
	$resServicesList = $objServiceProc->getServedDetails("",$arrDBTaskManagement);
	$tempArr = array();
	while($objServicesList = mysql_fetch_object($resServicesList)){
		array_push($tempArr, $objServicesList);
	}
	$jsonServices = json_encode($tempArr);	
		?>
<script>
	var formloadedObject = {formAction:"ratingAdded",resultCallBack:<?php echo $jsonServices; ?>, "serviceComentOnly" : <?php echo $isSrvicComent; ?>};
	console.log(formloadedObject);
	window.top.formloadComplete(formloadedObject);
</script>