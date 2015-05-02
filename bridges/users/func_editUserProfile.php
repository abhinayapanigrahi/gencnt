<?php
require_once("../../include/config.php");
require_once("../../objectManagers/userManager.php");
require_once("../../Process/userProfileMgt.php");

		$updateUserDetails	= new userProfileManager();
		
		//$userName 			= trim($_REQUEST['userName']);
		$newPassword 		= trim($_REQUEST['genUserPass1']);
		$newConfpassword 	= trim($_REQUEST['genUserConfPass']);
		$fullName 			= trim($_REQUEST['genFullName']);
		$address 			= trim($_REQUEST['genAddress']);
		$phone 				= trim($_REQUEST['genUserPhone']);
		$email 				= trim($_REQUEST['genUserEmail']);
		$dob 				= trim($_REQUEST['genUserDOB']);
		$dob				= substr($dob,6,4)."-".substr($dob,3,2)."-".substr($dob,0,2);		
		$profileID			= trim($_REQUEST['hdn_genUserId']);
		$languageList		= $_POST['genUserLanguage'];


			$updateUserDetails->setUserID($profileID);
			if($newConfpassword == $newPassword && !empty($newPassword)){
				$updateUserDetails->setPassword(md5($newPassword));
			}
			$updateUserDetails->setFullName($fullName);
			$updateUserDetails->setAddress($address);
			$updateUserDetails->setPhone($phone);
			$updateUserDetails->setEmail($email);
			$updateUserDetails->setDOB($dob);
			$updateUserDetails->setUserLanguages($languageList);
			
			$userObjct 		= new userProfileProcessor();
			$userList   	= $userObjct->updateUserDetailsByUserId($updateUserDetails,$arrDBTaskManagement);
			
			//header("location : ../../profile.php");exit;

?>
<script>
	location.href = "../../profile.php";
</script>