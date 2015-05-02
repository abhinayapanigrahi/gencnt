<?php
require_once("../../include/config.php");
require_once("../../objectManagers/userManager.php");
require_once("../../Processors/class_userProcessor.php");

		$updateUserDetails	= new updateUserManager();
		
		//$userName 			= trim($_REQUEST['userName']);
		$newPassword 		= trim($_REQUEST['newUserPassword']);
		$newConfpassword 	= trim($_REQUEST['newConfPassword']);
		$fullName 			= trim($_REQUEST['fullName']);
		$address 			= trim($_REQUEST['userAddress']);
		$desigID 			= trim($_REQUEST['NewDesignation']);
		$phone 				= trim($_REQUEST['userPhone']);
		$email 				= trim($_REQUEST['userEmail']);
		$dob 				= trim($_REQUEST['userDOB']);
		$dob				= substr($dob,6,4)."-".substr($dob,3,2)."-".substr($dob,0,2);
		$doj 				= trim($_REQUEST['userDOJ']);
		$doj				= substr($doj,6,4)."-".substr($doj,3,2)."-".substr($doj,0,2);		
		$profileID			= trim($_REQUEST['hdn_editingProfileID']);


			$updateUserDetails->setUserID($profileID);
			//$updateUserDetails->setUserName($userName);
			if($newConfpassword == $newPassword){
				$updateUserDetails->setPassword(md5($newPassword));
			}
			$updateUserDetails->setFullName($fullName);
			$updateUserDetails->setAddress($address);
			$updateUserDetails->setDesigID($desigID);
			$updateUserDetails->setPhone($phone);
			$updateUserDetails->setEmail($email);
			$updateUserDetails->setDOB($dob);
			$updateUserDetails->setDOJ($doj);
			$updateUserDetails->setAuthontecationToken($authToken);
			$updateUserDetails->setLastLogedInTime($lastLogedIN);
			
			$userObjct 		= new userProcessor();
			$userList   	= $userObjct->updateUserDetails($updateUserDetails,$arrDBTaskManagement);

?>