<?php

require_once("appMgt.php");

class servicesProcessor extends applicationProcessor {
	
	private $serviceID_;
	private $servicesName_;
	private $servicesDesc_;

	private $arrServiceID = array();
	private $postedServicesID = array();
	private $postedServicePrice = array();
	private $postedServiceUnit = array();
	private $postedServiceTime = array();
	private $postedserviceComment = array();

	private $insertVals = "";
	private $updateVals = "";
	
	public function getAllServices($params,$dbconn){
		
		$objAoth = new authenticationProcessor();
		
		$sql_AllServices =  "SELECT * FROM ".TABLE_SERVICES_MASTER;
		$res = $this->queryExecuter($sql_AllServices,$dbconn);
		return $res;
	}
	function manageSevices($params,$dbconn){
		
		$serviceID = $params->getServiceID();	
		
		if(empty($serviceID)){
			$this->addNewServices($params,$dbconn);
		}else{
			$this->updateServiceDetails($params,$dbconn);
		}
	}
	public function addNewServices($params,$dbconn){
		
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID = $userDetails['userID'];
		
		$serviceName 	= $params->getServiceName();
		$serviceDesc 	= $params->getServiceDesc();
		
		$sql_AddServices =  "INSERT INTO ".TABLE_SERVICES_MASTER. " SET service_name = '".$serviceName."', service_desc = '".$serviceDesc."'";
		$res = $this->NoNqueryExecuter($sql_AddServices,$dbconn);
		return $res;
	}		

	function updatePostedServiceStatus($params,$dbconn){
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID = $userDetails['userID'];
		
		$postedserviceID		= $params->getServiceID();		
		$serviceStatus			= $params->getStatus();		

		$sql_update_event =  "UPDATE ".TABLE_POSTEDSERVICES_MASTER." SET service_status = '".$serviceStatus."', u_by = '".$userID."', u_by = NOW() WHERE ps_id = ".$postedserviceID;

		$this->NoNqueryExecuter($sql_update_event,$dbconn);	
	}
	function getPostedServiceDetails($params,$dbconn){

		$postedserviceID	= $params->getServiceID();		

		$sql_getPostServiceDetail =  "SELECT * FROM ".TABLE_POSTEDSERVICES_MASTER." WHERE ps_id = ".$postedserviceID;

		$res = $this->queryExecuter($sql_getPostServiceDetail,$dbconn);	
		return $res;
	}	
	
	function updateServiceDetails($params,$dbconn){

		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID = $userDetails['userID'];
		
		$serviceName 	= $params->getServiceName();
		$serviceDesc 	= $params->getServiceDesc();
		$serviceID		= $params->getServiceID();		

		$sql_update_event =  "UPDATE ".TABLE_SERVICES_MASTER." SET service_name = '".$serviceName."', service_desc = '".$serviceDesc."' WHERE service_id = ".$serviceID;

		$res = $this->NoNqueryExecuter($sql_update_event,$dbconn);
		return $res;		
	}
	function getUserPostedServices($params,$dbconn){
		$tempArr = array();
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID = $userDetails['userID'];
		
		$sql_allUPService =  "SELECT sp.*, s.service_id as serviceID, s.service_name, s.service_desc FROM (SELECT ps.ps_id, IF(ps.service_id = 'NULL','',ps.service_id) AS service_id , ps.price, ps.serviceunit, ps.servicetime, ps.comments, ps.service_status FROM ".TABLE_POSTEDSERVICES_MASTER." ps WHERE ps.uid = ".$userID.") AS sp RIGHT JOIN ".TABLE_SERVICES_MASTER."  as s ON sp.service_id = s.service_id ";
		
		
		$res2 = $this->queryExecuter($sql_allUPService,$dbconn);
		while($arrServ = mysql_fetch_assoc($res2)){
			array_push($tempArr,$arrServ);
		}
		return $tempArr;		
	}
	
	function updatePostedServiceList($params,$dbconn){

		$tempArr = array();
		
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID = $userDetails['userID'];
				
		$this->postedServicesID 		= $params->getPostedServiceID();
		$this->arrServiceID 			= $params->getServiceID();
		$this->postedServicePrice 		= $params->getServicePrice();
		$this->postedServiceUnit 		= $params->getServiceUnit();
		$this->postedServiceTime 		= $params->getServiceTime();
		$this->postedserviceComment 	= $params->getServiceComment();
		$comma = "";		
		
		foreach($this->arrServiceID as $key => $val){
			if(array_key_exists($key,$this->postedServicesID)){
				$this->updateVals = "UPDATE ".TABLE_POSTEDSERVICES_MASTER." SET price = '".$this->postedServicePrice[$key]."', serviceunit = '".$this->postedServiceUnit[$key]."',  servicetime = '".$this->postedServiceTime[$key]."', comments = '".$this->postedserviceComment[$key]."', u_by = '".$userID."', u_date = NOW() WHERE ps_id = '".
				$this->postedServicesID[$key]."'";
				
			$this->NoNqueryExecuter($this->updateVals,$dbconn);
			$this->updateVals = "";
			}else{
				$this->insertVals .= $comma."('".$this->arrServiceID[$key]."','".$this->postedServicePrice[$key]."','".$this->postedServiceUnit[$key]."','".$this->postedServiceTime[$key]."','".$this->postedserviceComment[$key]."','".$userID."','".$userID."',NOW())";
				$comma = ",";						
			}
			
		}
		
		
		$sql_postNewService =  "INSERT INTO ".TABLE_POSTEDSERVICES_MASTER." (service_id, price, serviceunit, servicetime, comments, uid, i_by, i_date) VALUES ".$this->insertVals;
		
		$this->NoNqueryExecuter($sql_postNewService,$dbconn);
		
		$this->redirectURL("../../services.php");

	}
	public function searchServices($params,$dbconn){
		
		$tempArr = array();
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID 		= $userDetails['userID'];
		$searchterm 	= $params->getSearchText();
		
		$sql_serviceSearch =  "SELECT sp.*, s.service_id as serviceID, s.service_name, s.service_desc FROM (SELECT ps.ps_id, IF(ps.service_id = 'NULL','',ps.service_id) AS service_id , ps.price, ps.serviceunit, ps.servicetime, ps.comments, ps.service_status, ps.grade_point, ps.served, ((ps.grade_point*100)/(ps.served * 6)) ratings  FROM ".TABLE_POSTEDSERVICES_MASTER." AS ps) AS sp INNER JOIN ".TABLE_SERVICES_MASTER."  as s ON sp.service_id = s.service_id WHERE LOCATE('".$searchterm."', s.service_name) OR  LOCATE('".$searchterm."', s.service_desc) ORDER BY sp.grade_point DESC";
		
		$sql_serviceSearch =  "SELECT sp.*, s.service_id as serviceID, s.service_name, s.service_desc FROM 
		(SELECT ps.ps_id, IF(ps.service_id = 'NULL','',ps.service_id) AS service_id , ps.price, ps.serviceunit, ps.servicetime, ps.comments, ps.service_status, ps.grade_point, ps.served, ((ps.grade_point*100)/(ps.served * 6)) ratings  FROM ".TABLE_POSTEDSERVICES_MASTER." AS ps) AS sp 
		INNER JOIN ".TABLE_SERVICES_MASTER."  as s ON sp.service_id = s.service_id 
		WHERE LOCATE('".$searchterm."', s.service_name) OR  LOCATE('".$searchterm."', s.service_desc) ORDER BY sp.grade_point DESC";
				
		
		$res2 = $this->queryExecuter($sql_serviceSearch,$dbconn);
		while($arrServ = mysql_fetch_assoc($res2)){
			array_push($tempArr,$arrServ);
		}
		return $tempArr;		
		
	}
	public function getPostedServiceProviderDetails($params,$dbconn){
		
		$tempArr = array();
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID 		= $userDetails['userID'];	
		
		$psID = $params->getServiceID();
		
		$sql_serviceProvider =  "SELECT ps.ps_id, u.fullname,u.phone,u.email FROM ".TABLE_POSTEDSERVICES_MASTER." as ps inner join ".TABLE_USER_MASTER." as u on ps.uid = u.uid where ps.ps_id = ".$psID;

		$res2 = $this->queryExecuter($sql_serviceProvider,$dbconn);
//		echo (int)empty($res2);
		$arrServ = mysql_fetch_assoc($res2);
		
		/*
		while($arrServ = mysql_fetch_assoc($res2)){
			array_push($tempArr,$arrServ);
		}*/
		return $arrServ;
	}
	public function serviceDealConfirmaton($params,$dbconn){
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID 		= $userDetails['userID'];
		$psID			= $params->getPostedServiceID();
		$params->setHour(24);
		
		$res1Hrs = $this->findDealwithinHrs($params,$dbconn);
		if(mysql_num_rows($res1Hrs) == 0){

			$uniqueKeys		= $this->generateUniqueKeys($dbconn);
			
			$sql_dealConfirmation = "INSERT INTO ".TABLE_DEAL_MASTER." SET deal_id = '".$uniqueKeys['dealID']."', u_id = '".$userID."', ps_id = '".$psID."', client_code = '".$uniqueKeys['dealID']."', hire_code = '".$uniqueKeys['hireCode']."', rate1 = '', rate2 = '', rate3 = '', deal_comment='', deal_hiredby = '',	deal_hiredto ='', i_date = NOW()";
			
			$res = $this->NoNqueryExecuter($sql_dealConfirmation,$dbconn);
			return $uniqueKeys;
			
		}
	}	
	public function findDealwithinHrs($params,$dbconn){
		
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID 		= $userDetails['userID'];
			
		$hrs 	= $params->getHour();
		$ps_id 	= $params->getPostedServiceID();
		
		$sql_dealWitinHrs = "SELECT * FROM ".TABLE_DEAL_MASTER." WHERE i_date > DATE_SUB(NOW(), interval ".$hrs." hour) AND u_id = '".$userID."' AND ps_id = ".$ps_id;
		
		$res2 = $this->queryExecuter($sql_dealWitinHrs,$dbconn);
		
		return $res2;
	}
	private function generateUniqueKeys($dbconn){
		
		$keyArray		= $this->generateKeys();
		
		$tbl_deal_keyExists = "SELECT deal_id, client_code, hire_code FROM ".TABLE_DEAL_MASTER." WHERE deal_id = '".$keyArray['dealID']."' OR client_code = '".$keyArray['clientCode']."' OR hire_code = '".$keyArray['hireCode']."'";
		
		$res2 = $this->queryExecuter($tbl_deal_keyExists,$dbconn);

		if(mysql_num_rows($res2) == 0){
			return $keyArray;
		}else{
			$obj = mysql_fetch_object($res2);
			
			if($obj->deal_id == $keyArray['dealID'] || $obj->client_code == $keyArray['clientCode'] || $obj->hire_code != $keyArray['hireCode']){
				$this->generateUniqueKeys($dbconn);
			}		
		}
	}
	
	private function generateKeys($keyType=""){
		$dealID 		= "DL";
		$clientCode 	= "CC";
		$hireCode		= "HC";
		$timeFactor		= time();
		$tempArray 	= array();
		
		$chars = 8;
		$letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		
		$tempArray['dealID'] 		= $dealID . substr(str_shuffle($letters), 0, $chars).$timeFactor;
		$tempArray['clientCode'] 	= $clientCode . substr(str_shuffle($letters), 0, $chars).$timeFactor;
		$tempArray['hireCode']		= $hireCode . substr(str_shuffle($letters), 0, $chars).$timeFactor;
				
		switch($keyType){
			case "D":
				return $tempArray['dealID'];
			break;
			case "C":
				return $tempArray['clientCode'];
			break;
			case "H":
				return $tempArray['hireCode'];
			break;
		}
		
		return $tempArray;
	}
	
	public function getServedDetails($params,$dbconn){
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID = $userDetails['userID'];

		$sql_servedDetails = "
							SELECT ts.service_id, ts.service_name, ts.service_desc, tps.ps_id, tps.service_id, tps.price, tps.serviceunit, tps.servicetime, tps.comments, 
							td.deal_id, td.client_code, td.hire_code, td.rate1, td.rate2, td.rate3, ((rate1+rate2+rate3)/3) as avgRating, td.deal_comment, DATE_FORMAT(td.i_date,'%d/%b/%y') as requstedOn
							FROM ".TABLE_SERVICES_MASTER."   AS ts
							RIGHT JOIN ".TABLE_POSTEDSERVICES_MASTER."  AS tps ON ts.service_id = tps.service_id
							RIGHT JOIN ".TABLE_DEAL_MASTER." AS td ON td.ps_id = tps.ps_id
							WHERE td.u_id =".$userID ;	
									
		$res = $this->queryExecuter($sql_servedDetails,$dbconn);
		return $res;
	}
	public function getAllServiceRequests($params,$dbconn){
		$obj_Authentication = new authenticationProcessor();

		$userDetails = $obj_Authentication->logedinUserDetails();
		$userID = $userDetails['userID'];

		$sql_servedRequest = "SELECT td.u_id, td.ps_id, td.deal_status, tp.service_id, ts.service_name, tu.fullname, DATE_FORMAT(td.i_date,'%d/%b/%y') as requstedOn 
								FROM ".TABLE_DEAL_MASTER." as td 
								LEFT JOIN ".TABLE_POSTEDSERVICES_MASTER." as tp 
								on td.ps_id = tp.ps_id
								LEFT JOIN ".TABLE_SERVICES_MASTER." as ts 
								ON ts.service_id = tp.service_id
								LEFT JOIN ".TABLE_USER_MASTER." AS tu
								ON td.u_id = tu.uid 
								WHERE tp.uid = ".$userID ." ORDER BY td.i_date";	
									
		$res = $this->queryExecuter($sql_servedRequest,$dbconn);
		return $res;	
	}
	public function addServiceFeedback($params,$dbconn) {
		
		$dealID 	= $params->getDealID();
		$rate1 		= $params->getRate1();
		$rate2 		= $params->getRate2();
		$rate3 		= $params->getRate3();
		$feeback 	= $params->getFeedback();
		
		
		$sql_serviceFeedback = "UPDATE ".TABLE_DEAL_MASTER." SET  rate1 = '".$rate1."', rate2 = '".$rate2."', rate3 = '".$rate3."', deal_comment = '".$feeback."' WHERE CONVERT(deal_id USING utf8 ) = '".$dealID."'";	
									
		$res = $this->NoNqueryExecuter($sql_serviceFeedback,$dbconn);
		
		$this->updateTotalGradePoint($params,$dbconn);
		
		return $res;		
	}
	private function updateTotalGradePoint($params,$dbconn){
		
		$psID			= $params->getPsID();
		$totlaGrade		= 	$params->getRate1() + $params->getRate2() + $params->getRate3();
		
		$sql_updateGradePoint = "UPDATE ".TABLE_POSTEDSERVICES_MASTER." AS a CROSS JOIN ".TABLE_POSTEDSERVICES_MASTER." AS b SET a.grade_point = b.grade_point+ ".$totlaGrade.", a.served = b.served+1 WHERE a.ps_id = '".$psID."' AND b.ps_id = '".$psID."'";	
									
		$res = $this->NoNqueryExecuter($sql_updateGradePoint,$dbconn);		
	}
	
	public function addServiceFeedbackComment($params,$dbconn) {
		
		$dealID 	= $params->getDealID();
		$feeback 	= $params->getFeedback();
		
		
		$sql_serviceFeedbackComent = "UPDATE ".TABLE_DEAL_MASTER." SET deal_comment = '".$feeback."' WHERE CONVERT(deal_id USING utf8 ) = '".$dealID."'";	
									
		$res = $this->NoNqueryExecuter($sql_serviceFeedbackComent,$dbconn);		
		return $res;		
	}
	
}
?>