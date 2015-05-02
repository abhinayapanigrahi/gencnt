<?php
require_once("../../include/config.php");
require_once("../../objectManagers/userManager.php");
require_once("../../Processors/class_userProcessor.php");


		$objGetUsersListBySearch		= new listUserByKeyWordManager();
		
		$searchWord 			= trim($_REQUEST['searchWord']);

			$objGetUsersListBySearch->setSearchWord($searchWord);
			
			$userObjct 	= new userProcessor();
			$taskChesList   = $userObjct->getAllUserListForIM($objGetUsersListBySearch,$arrDBTaskManagement);
			
			$userListArr	= array();
			
			while($obj = mysql_fetch_object($taskChesList)){
				array_push($userListArr,$obj);
			}
			print_r($userListArr);

?>