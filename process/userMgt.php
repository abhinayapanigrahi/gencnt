<?php
require_once("appMgt.php");
require_once("userhelper.php");

class userLoginProcessor extends applicationProcessor {
	
	private $userLogin_;
	private $userID_;
	private $username_;
	private $userSecretToken_;
	private $userDesignation_;
	
	public function checkLogin($params,$dbconn)
	{
		$objAoth = new authenticationProcessor();
		
		$username = $params->getUsername();
		$password = $params->getPassword();

		if(empty($username) || empty($password)){
			$objAoth->redirectToURL(4);exit;
		}
		$sql_Login =  "SELECT *,DATE_FORMAT(last_loggedin,'%D %b %Y, %W') lastLoggedIn FROM ".TABLE_USER_MASTER." WHERE user_name = '".$username."' AND user_password = '".md5($password)."'";
		$res = $this->queryExecuter($sql_Login,$dbconn);

		if(mysql_num_rows($res) == 1)
		{
		
			$objUser = mysql_fetch_object($res);		
		
			$accessString = implode(",",$this->getAccessforDesignation($objUser->desig_id,$dbconn));
			$objAoth->setCookie("userLogin",$objUser->uid,"");
			$objAoth->setCookie("userID",$objUser->uid,"");			
			$objAoth->setCookie("userName",$objUser->user_name,"");
			$objAoth->setCookie("authenticationToken",$objUser->authonticaionToken,"");
			$objAoth->setCookie("designation",$objUser->desig_id,"");
			$objAoth->setCookie("lastLogin",$objUser->lastLoggedIn,"");			
			$objAoth->setCookie("accessDetails",$accessString,"");			

			$objAoth->redirectToURL(2);exit;
		}
		else
		{
			$objAoth->redirectToURL(1);exit;
		}
	}
	
	public function logOutUser($dbconn)
	{

		$objAoth = new authenticationProcessor();

		$this->updateLastLogin($dbconn);

			$objAoth->setCookie("userLogin",$objUser->uid,time()-100);
			$objAoth->setCookie("userID",$objUser->uid,time()-100);			
			$objAoth->setCookie("userName",$objUser->user_name,time()-100);
			$objAoth->setCookie("authenticationToken",$objUser->authonticaionToken,time()-100);
			$objAoth->setCookie("designation",$objUser->desig_id,time()-100);
			$objAoth->setCookie("accessDetails","",time()-100);	
			$objAoth->setCookie("userRegistrations","","");			
			$objAoth->redirectToURL(3);exit;
	}			
	
	private function updateLastLogin($dbconn){
	
	$sql_updateLastLogin = "UPDATE ".TABLE_USER_MASTER." SET last_loggedin = NOW() WHERE uid = ".$_COOKIE['userID'];
	$res = $this->NoNqueryExecuter($sql_updateLastLogin,$dbconn);
		
	}
	
	private function getAccessforDesignation($dsigID,$dbconn){

		$desigArr = array();
		$sql_desigAccess = "SELECT * FROM ".TABLE_DESIG_ACCESS." WHERE desig_id = ".$dsigID;
		$resDesigAcc = $this->queryExecuter($sql_desigAccess,$dbconn);
		while($objDesigAcc = mysql_fetch_object($resDesigAcc)){
			array_push($desigArr,$objDesigAcc->access_id);
		}
		return $desigArr;
	}	
	
	public function addNewUser($params,$dbconn)
	{
		$objAoth = new authenticationProcessor();
		$objHelper= new userhelper();

		
		$username = $params->getUsername();
		$password = $params->getPassword();
		$confpassword = $params->getConfPassword();
		$phone = $params->getPhone();
		$email = $params->getEmail();	

		if(empty($username) || empty($password) || empty($confpassword) || empty($phone) || empty($email) ){
			$objAoth->redirectToURL(6);exit;
		}

		if($objHelper->isUserExist($username,$dbconn)){
		
			$objAoth->redirectToURL(6);exit;
		}
		
		if($password != $confpassword ){
			$objAoth->redirectToURL(6);exit;
		}
		
		$token=$objHelper->uniqueKeygenerator();		
		$md5pass=md5($password);

		$sql_Login =  "INSERT INTO ".TABLE_USER_MASTER." (user_name, user_password, phone , email, doj, authonticaionToken,i_by,i_date) VALUES ('".$username."', '".$md5pass."', '".$phone."','".$email."',NOW(), '".$token."',0,NOW())";
		
		$res = $this->queryExecuter($sql_Login,$dbconn);

		if($res == 1)
		{							
			$objAoth->setCookie("userRegistrations","1","");
			
			$objLUMngr2 = new userLoginManager();	
			$objLUMngr2->setUserName($username);
			$objLUMngr2->setPassword($password);

			$this->checkLogin($objLUMngr2,$dbconn);
		}
		else
		{
			$objAoth->redirectToURL(1);exit;
		}
	}
	
	
	
	public function getUserDetails($params,$dbconn)
	{
		$objAoth = new authenticationProcessor();
		$userId= $params;
		
		
		$sql_Login =  "SELECT * FROM ".TABLE_USER_MASTER." WHERE uid = ".$userId;
		
		$res = $this->queryExecuter($sql_Login,$dbconn);

		if($res == 1)
		{							
			return mysql_fetch_object($res);
		}
		else
		{
			return "NO RESULTS";
		}
	}

	public function isUserNameExists($params,$dbconn) {
		
		$userName = $params->getUserName();
		
		$sql_userExists =  "SELECT * FROM ".TABLE_USER_MASTER." WHERE user_name = '".$userName."' ";
		
		$res = $this->queryExecuter($sql_userExists,$dbconn);
		$numrow = mysql_num_rows($res);
		
		return $numrow;
		
	}
	
	
	
		
}
?>