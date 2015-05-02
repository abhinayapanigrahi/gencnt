<?php
require_once("appMgt.php");

class statesProcessor extends applicationProcessor  {			

	
	private function getStateById($params,$dbconn){

		$stateID = $params->getStateId();
		
		$sql = "SELECT * FROM ".TABLE_STATE_MASTER." WHERE state_id = ".$stateID;
		$res = $this->queryExecuter($sql,$dbconn);
		
		return $res;
	}		
	
	public function getAllStates($dbconn){		
		
		$sql_allStates =  "SELECT s.* FROM ".TABLE_STATE_MASTER." as s left join ".TABLE_COUNTRY_MASTER." as c on c.country_id = s.country_id order by s.country_id, s.state ASC";
				
		$res = $this->queryExecuter($sql_allStates,$dbconn);
		if(empty($dbconn["getArr"])){
			return $res; 
		}else{
			$tmpArr = array();
			while($obj = mysql_fetch_assoc($res)){
				array_push($tmpArr,$obj);
			}
			return $tmpArr;
		}
	}
	
	public function getStateListForCountryID($params,$dbconn){
		$countrID = $params->getCountryId();
					
		$sql_stateList =  "SELECT state_id,state FROM ".TABLE_STATE_MASTER. " WHERE country_id = ".$countrID." ORDER BY state ASC";
		
		$res = $this->queryExecuter($sql_stateList,$dbconn);
		return $res;
	}
	
	public function addNewState($params,$dbconn)
	{
		$countryID 		=	$params->getCountryId();
		$stateName 		=	$params->getStateName();

		$sql =  "INSERT INTO ".TABLE_STATE_MASTER." (country_id,state) VALUES ('".$countryID."','".$stateName."')";		
		$res = $this->NoNqueryExecuter($sql,$dbconn);
	
	}
		
	public function updateState($params,$dbconn){
	
		$countryID 		=	$params->getCountryId();
		$stateID		=	$params->getStateId();
		$stateName 		=	$params->getStateName();
	
		$sql_updateState = "UPDATE ".TABLE_STATE_MASTER." SET state='".$stateName."' ,country_id='".$countryID."' WHERE state_id = ".$stateID;
		$res = $this->NoNqueryExecuter($sql_updateState,$dbconn);

	}
	
		
}
?>