<?php
require_once("../../include/config.php");
require_once("../../objectManagers/userManager.php");
require_once("../../Processors/class_userProcessor.php");

		$objAddEditUser	= new addUserManager();
	//print_r($_REQUEST);	
		$NewUserName 		= trim($_REQUEST['newUserName']);
		$newPassword 		= trim($_REQUEST['newUserPassword']);
		$newConfpassword 	= trim($_REQUEST['newConfPassword']);
		$fullName 			= trim($_REQUEST['fullName']);
		$address 			= trim($_REQUEST['userAddress']);
		$NewDesigID 		= trim($_REQUEST['NewDesignation']);
		$phone 				= trim($_REQUEST['userPhone']);
		$email 				= trim($_REQUEST['userEmail']);
		$dob 				= trim($_REQUEST['userDOB']);
		$dob				= substr($dob,6,4)."-".substr($dob,3,2)."-".substr($dob,0,2);
		$doj 				= trim($_REQUEST['userDOJ']);
		$doj				= substr($doj,6,4)."-".substr($doj,3,2)."-".substr($doj,0,2);		


			
			if($newPassword == $newConfpassword){
				$objAddEditUser->setPassword(md5($newPassword));			
			}
			
			$objAddEditUser->setUserName($NewUserName);
			$objAddEditUser->setFullName($fullName);
			$objAddEditUser->setAddress($address);
			$objAddEditUser->setDesigID($NewDesigID);
			$objAddEditUser->setPhone($phone);
			$objAddEditUser->setEmail($email);
			$objAddEditUser->setDOB($dob);
			$objAddEditUser->setDOJ($doj);
			$objAddEditUser->setAuthontecationToken($authToken);
			$objAddEditUser->setLastLogedInTime($lastLogedIN);
			
			$userObjct 		= new userProcessor();
			$userList   	= $userObjct->addUserDetails($objAddEditUser,$arrDBTaskManagement);

?>