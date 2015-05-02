<?php
require_once("../../include/config.php");
require_once("../../objectManagers/languageManager.php");
require_once("../../process/languageMgt.php");

$objLangProc = new languageProcessor();
	
if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{

	$langID 	= $_POST['selectLanguage'];
	$langName	= $_POST['txtlanguage']; 
	$act = "";

	$replace_arr = array("#","/","\/","=",">","<","!","&");
	$langName = str_replace($replace_arr,"",$langName);

	$objLangMngr = new languageManager();
	
		$objLangMngr->setLanguage($langName);	
	if(!empty($langID)){
		$objLangMngr->setLanguageId($langID);
		$act = 'u';
		$objLangProc->updateLanguage($objLangMngr,$arrDBTaskManagement);
	}else{
		$act = 'a';	
		$langID = $objLangProc->addNewLanguage($objLangMngr,$arrDBTaskManagement);
	}

	
		header("location: ../../manageMasters.php?mpg=lng&msg=".$act."&lngid=".$langID);
	
}
?>