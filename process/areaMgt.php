<?php
require_once("appMgt.php");

class areaProcessor extends applicationProcessor  {			

	
	public function getAreaById($areaID,$dbconn){

		$sql = "SELECT * FROM ".TABLE_AREA_MASTER." WHERE area_id = ".$areaID;
		$res = $this->queryExecuter($sql,$dbconn);
		if($res == 1)
		{							
			return $res;
		}
		else
		{
			return "NO RESULTS";
		}
	}		
	
	public function getAllAreas($dbconn)
	{		
		
		$sql_area =  "SELECT * FROM ".TABLE_AREA_MASTER. " ORDER BY area ASC";
		
		$res = $this->queryExecuter($sql_area,$dbconn);
		if($res >= 1)
		{							
			return $res;
		}
		else
		{
			return "NO RESULTS";
		}
	}
	
	public function getAreasByCityId($cityID,$dbconn){

		$sql = "SELECT * FROM ".TABLE_AREA_MASTER." WHERE city_id = ".$cityID. " ORDER BY area ASC";
		$res = $this->queryExecuter($sql,$dbconn);
		if($res >= 1)
		{							
			return $res;
		}
		else
		{
			return "NO RESULTS";
		}
	}
	
	public function addNewArea($params,$dbconn)
	{
		$cityId 		= 	$params->getCityID();
		$areaName 		= 	$params->getAreaName();
		$landmark 		= 	$params->getLandmark();	
		$pincode 		= 	$params->getPincode();	

		if(empty($cityId)){
			return "Empty city name";
		}else if(empty($areaName)){
			return "Empty area name";
		}
		

		$sql_areaadd =  "INSERT INTO ".TABLE_AREA_MASTER." (area, landmark, pincode, city_id) VALUES ('".$areaName."', '".$landmark."', '".$pincode."', '".$cityId."')";
		
		$res = $this->queryExecuter($sql_areaadd,$dbconn);

		if($res == 1)
		{							
			return "sucess";
		}
		else
		{
			return "failed";
		}	
	
	}
	

		
	public function updateArea($params,$dbconn){

		$cityId 		= 	$params->getCityID();
		$areaId 		= 	$params->getAreaId();	
		$areaName 		= 	$params->getAreaName();
		$landmark 		= 	$params->getLandmark();	
		$pincode 		= 	$params->getPincode();	

		if(empty($cityId)){
			return "Empty city name";
		}else if(empty($areaName)){
			return "Empty area name";
		}
	
			
   echo $sql_updateArea = "UPDATE ".TABLE_AREA_MASTER." SET area='".$areaName."' , landmark='".$landmark."' , pincode= '".$pincode."', city_id= '".$cityId."' WHERE area_id = ".$areaId;
	$res = $this->NoNqueryExecuter($sql_updateArea,$dbconn);
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