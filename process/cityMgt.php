<?php
require_once("appMgt.php");

class cityProcessor extends applicationProcessor  {			

	
	private function getCityById($params,$dbconn){

		$cityID = $params->getCityId();
		
		$sql = "SELECT * FROM ".TABLE_CITY_MASTER." WHERE city_id = ".$cityID;
		$res = $this->queryExecuter($sql,$dbconn);
		
		return $res;
	}		
	
	private function getAllCities($params,$dbconn){
		
		$sql = "SELECT * FROM ".TABLE_CITY_MASTER;
		$res = $this->queryExecuter($sql,$dbconn);
		
		return $res;
	}

	public function getAllCitiesByState($params,$dbconn){		
		
		$stateID = $params->getStateId();

		$sql_allCities =  "SELECT ct.* FROM ".TABLE_CITY_MASTER." as ct left join ".TABLE_STATE_MASTER." as st ON st.state_id = ct.state_id WHERE ct.state_id = ".$stateID." ORDER BY ct.city ASC";
				
		$res = $this->queryExecuter($sql_allCities,$dbconn);
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
	
	public function getAllCitiesByCountry($params,$dbconn){		
		
		$countryID = $params->getCountryId();

		$sql_cityListForCountry =  "SELECT ct.*, cn.country_id FROM ".
						TABLE_CITY_MASTER." AS ct LEFT JOIN ".
						TABLE_STATE_MASTER." AS st ON ct.state_id = st.state_id LEFT JOIN ".
						TABLE_COUNTRY_MASTER." AS cn ON cn.country_id = st.country_id 
						WHERE cn.country_id = ".$countryID." ORDER BY st.state, ct.city ASC";
				
		$res = $this->queryExecuter($sql_cityListForCountry,$dbconn);
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
					
		$sql_stateList =  "SELECT city_id,state FROM ".TABLE_CITY_MASTER. " WHERE country_id = ".$countrID." ORDER BY state ASC";
		
		$res = $this->queryExecuter($sql_stateList,$dbconn);
		return $res;
	}
	
	public function addNewState($params,$dbconn)
	{
		$countryID 		=	$params->getCountryId();
		$stateName 		=	$params->getStateName();

		$sql =  "INSERT INTO ".TABLE_CITY_MASTER." (country_id,state) VALUES ('".$countryID."','".$stateName."')";		
		$res = $this->NoNqueryExecuter($sql,$dbconn);
	
	}
		
	public function updateState($params,$dbconn){
	
		$countryID 		=	$params->getCountryId();
		$stateID		=	$params->getStateId();
		$stateName 		=	$params->getStateName();
	
		$sql_updateState = "UPDATE ".TABLE_CITY_MASTER." SET state='".$stateName."' ,country_id='".$countryID."' WHERE city_id = ".$stateID;
		$res = $this->NoNqueryExecuter($sql_updateState,$dbconn);

	}
	
		
}
?>