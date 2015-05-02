<?php
require_once("../../include/config.php");
require_once("../../objectManagers/serviceManager.php");
require_once("../../process/servicesMgt.php");

$objServiceProc = new servicesProcessor();
	
if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{
	$serviceName 	= $_POST['addService'];
	$serviceDesc 	= $_POST['addServiceDesc'];
	$hdnServiceID	= $_POST['editServiceID'];

	$replace_arr = array("#","/","\/","=",">","<","!","&","(",")");
	$serviceName = str_replace($replace_arr,"",$serviceName);
	$serviceDesc = str_replace($replace_arr,"",$serviceDesc);
	$objServMngr = new serviceManager();
	
	$objServMngr->setServiceName($serviceName);
	$objServMngr->setServiceDesc($serviceDesc);
	
	if(isset($_POST['editServiceID']) && !empty($hdnServiceID)){
		$objServMngr->setServiceID($hdnServiceID);
	}

	$objServiceProc->manageSevices($objServMngr,$arrDBTaskManagement);

}
	$resServicesList = $objServiceProc->getAllServices("",$arrDBTaskManagement);
	$tempArr = array();
	while($objServicesList = mysql_fetch_object($resServicesList)){
		array_push($tempArr, $objServicesList);
	}
	$jsonServices = json_encode($tempArr);	
	if(isset($_POST['editServiceID']) && !empty($hdnServiceID)){
		?>
		<script>
			var formloadedObject = {formAction:"editService",resultCallBack:<?php echo $jsonServices; ?>};
			window.top.formloadComplete(formloadedObject);
		</script>
		<?php	
	}else{
		?>
		<script>
			var formloadedObject = {formAction:"addService",resultCallBack:<?php echo $jsonServices; ?>};
			window.top.formloadComplete(formloadedObject);
		</script>
		<?php	
	}
?>
