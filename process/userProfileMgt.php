<?php
require_once("appMgt.php");

class userProfileProcessor extends applicationProcessor  {			

	
	public function getUserDetailsById($dbconn){

		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID = $userDetails['userID'];
	
		$sql = "SELECT * FROM ".TABLE_USER_MASTER." WHERE uid = ".$userID;
		$res = $this->queryExecuter($sql,$dbconn);
		
		return $res;
	}		
	
	public function getUserLanguageMap($dbconn) {
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID = $userDetails['userID'];
		
		$sql_userlangMap = "SELECT lm.uid, lm.lid FROM tbl_language AS l LEFT JOIN tbl_language_user_map AS lm ON l.lid = lm.lid WHERE lm.uid =".$userID;
		
		$res = $this->queryExecuter($sql_userlangMap,$dbconn);
		
		return $res;
		
	}

		
	public function updateUserDetailsByUserId($params,$dbconn){	
		
			$userID			=$params->getUserId();
			$newPassword	=$params->getPassword();
			$fullName		=$params->getFullName();
			$address		=$params->getAddress();
			//$desigID		=$params->getDesigID();
			$phone			=$params->getPhone();
			$email			=$params->getEmail();
			$dob			=$params->getDOB();
			//$doj			=$params->getDOJ();							
			//$lastLogedIN	=$params->setLastLogedInTime();
	
	$sql_updateState ="";	
	if($newPassword!="" || !empty($newPassword)){
		$sql_updateState = "UPDATE ".TABLE_USER_MASTER." SET user_password='".$newPassword."' ,fullname='".$fullName."' , address='".$address."' ,phone='".$phone."' ,email='".$email."' ,dob='".$dob."' WHERE uid = ".$userID;
	}
	else
	{
		$sql_updateState = "UPDATE ".TABLE_USER_MASTER." SET fullname='".$fullName."' , address='".$address."' ,phone='".$phone."' ,email='".$email."' ,dob='".$dob."' WHERE uid = ".$userID;
	}
	  $res = $this->NoNqueryExecuter($sql_updateState,$dbconn);
	  //return $res;

	 $sql_deleteAllLangmap = "DELETE FROM ".TABLE_LANGUAGE_USER_MAP." WHERE uid = ".$userID;
	
	 $res = $this->NoNqueryExecuter($sql_deleteAllLangmap,$dbconn);
		
		$sql_insertuserLangMap = "INSERT INTO ".TABLE_LANGUAGE_USER_MAP." (uid,lid) VALUE ";
		$comma = "";
		foreach($params->getUserLanguages() as $key=>$val){
				$sql_insertuserLangMap .= $comma."($userID,$val)";
				$comma = ",";
		}
		
	  $res = $this->NoNqueryExecuter($sql_insertuserLangMap,$dbconn);
	return true;  
	}
	
	//uid 	user_name 	user_password 	fullname 	address 	desig_id 	phone 	email 	dob 	doj 	authonticaionToken 	last_loggedin 	is_active 	i_by 	i_date 	u_by 	u_date
	
		
}
?>