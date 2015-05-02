<?php
require_once("appMgt.php");

class languageProcessor extends applicationProcessor  {			

	
	private function getLanguageById($params,$dbconn){

		$langID = $params->getStateId();
		
		$sql = "SELECT * FROM ".TABLE_LANGUAGE_MASTER." WHERE lid = ".$langID;
		$res = $this->queryExecuter($sql,$dbconn);
		
		return $res;
	}		
	
	public function getAllLanguages($dbconn){		
		
		$sql_allLang =  "SELECT * FROM ".TABLE_LANGUAGE_MASTER;
				
		$res = $this->queryExecuter($sql_allLang,$dbconn);

			return $res; 
	}	
	
	public function addNewLanguage($params,$dbconn)
	{
		$langName 		=	$params->getLanguage();

		$sql_insrtLang =  "INSERT INTO ".TABLE_LANGUAGE_MASTER." SET language = '".$langName."'";		
		$res = $this->NoNqueryExecuter($sql_insrtLang,$dbconn);
	
	}
		
	public function updateLanguage($params,$dbconn){
	
		$langID 		=	$params->getLanguageId();
		$langName 		=	$params->getLanguage();
	
		$sql_updateLang = "UPDATE ".TABLE_LANGUAGE_MASTER." SET language = '".$langName."' WHERE lid = ".$langID;
		$res = $this->NoNqueryExecuter($sql_updateLang,$dbconn);

	}
	
		
}
?>