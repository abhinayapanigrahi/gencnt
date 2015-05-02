<?php
require_once("../../include/config.php");
require_once("../../objectManagers/userLoginManager.php");
require_once("../../process/userMgt.php");

		$getUserObj	= new userLoginProcessor();
		$userMngr = new userRegistrationManager();
		$temArr = array();
		
		$userName 			= trim($_REQUEST['userName']);
		$replace_arr = array("#","/","\/","=",">","<","!","&","(",")","@","$");
		$userName = str_replace($replace_arr,"",$userName);

		$userMngr->setUserName($userName);

			$userExistsStatus = $getUserObj->isUserNameExists($userMngr,$arrDBTaskManagement);
			
			if($userExistsStatus == 1){
				$temArr["status"] = "exists";
				$temArr["exists"] = "100";
			}else{
				$temArr["status"] = "dont-exists";
				$temArr["exists"] = "200";				
			}

echo json_encode($temArr);

?>