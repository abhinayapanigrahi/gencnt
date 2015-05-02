<?php
require_once("appMgt.php");

class countriesProcessor extends applicationProcessor  {			

	
	private function getCountryById($countryID,$dbconn){

		$sql = "SELECT * FROM ".TABLE_COUNTRY_MASTER." WHERE country_id = ".$countryID;
		$res = $this->queryExecuter($sql,$dbconn);
		if($res == 1)
		{							
			return mysql_fetch_object($res);
		}
		else
		{
			return "NO RESULTS";
		}
	}		
	
	public function getAllCountries($dbconn)
	{		
		
		$sql_Login =  "SELECT * FROM ".TABLE_COUNTRY_MASTER. " ORDER BY country ASC";
		
		$res = $this->queryExecuter($sql_Login,$dbconn);
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
	
	public function addNewCountry($params,$dbconn)
	{
		$countryName 		= 	$params->getCountryName();
		$countryShortName 	= 	$params->getCountryShortName();	

		if(empty($countryName)){
			return "Empty country name";
		}
		

		$sql_Login =  "INSERT INTO ".TABLE_COUNTRY_MASTER." (country, country_shortname) VALUES ('".$countryName."', '".$countryShortName."')";
		
		$res = $this->queryExecuter($sql_Login,$dbconn);

		if($res == 1)
		{							
			return "sucess";
		}
		else
		{
			return "failed";
		}	
	
	}
	

		
	public function updateCountry($params,$dbconn){
	
	$countryId 			= 	$params->getCountryId();
	$countryName 		= 	$params->getCountryName();
	$countryShortName 	= 	$params->getCountryShortName();
	
   $sql_updateCountry = "UPDATE ".TABLE_COUNTRY_MASTER." SET country='".$countryName."' ,country_shortname='".$countryShortName."' WHERE country_id = ".$countryId;
	$res = $this->NoNqueryExecuter($sql_updateCountry,$dbconn);
		if($res == 1)
		{							
			return "sucess";
		}
		else
		{
			return "failed";
		}	
	}
	
	
		
}
?>