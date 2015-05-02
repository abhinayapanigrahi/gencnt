<?php
require_once("appMgt.php");

class languageProcessor extends applicationProcessor  {			
	
	public function getAllLanguages($dbconn){		
		
		$sql_allLang =  "SELECT * FROM ".TABLE_LANGUAGE_MASTER;
				
		$res = $this->queryExecuter($sql_allLang,$dbconn);

			return $res; 
	}	
	
	public function addMapUserLanguage($params,$dbconn)
	{
		$langName 		=	$params->getLanguage();

		$sql_insrtLang =  "INSERT INTO ".TABLE_LANGUAGE_MASTER." SET language = '".$langName."'";		
		$res = $this->NoNqueryExecuter($sql_insrtLang,$dbconn);
	
	}
		
	public function removeMapUserLanguage($params,$dbconn){
	
		$langID 		=	$params->getLanguageId();
		$uid 		=	$params->getUserId();
	
		$sql_updateLang = "DELETE * FROM ".TABLE_LANGUAGE_MASTER." WHERE lid = ".$langID." AND uid = ".$uid;
		$res = $this->NoNqueryExecuter($sql_updateLang,$dbconn);

	}
	
	private function getLanguageByUserId($params,$dbconn){

		$userID = $params->getUserId();
		
		$sql = "SELECT * FROM ".TABLE_LANGUAGE_MASTER." as a left join ".TABLE_LANGUAGE_USER_MAP." as b on a.lid=b.lid where b.uid =".$userID;
		$res = $this->queryExecuter($sql,$dbconn);
		
		return $res;
	}
	
		
}
?>