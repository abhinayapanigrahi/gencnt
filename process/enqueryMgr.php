<?php
require_once("../../include/config.php");
require_once("appMgt.php");

class enqueryProcessor extends applicationProcessor {
	
	public function addNewQuery($params,$dbconn)
	{
		$objAoth = new authenticationProcessor();
		
		$name = $params->getName();
		$phone = $params->getPhone();
		$email = $params->getEmail();
		$title = $params->getTitle();
		$subject = $params->getSubject();	
		
		$sql_Login =  "INSERT INTO ".TABLE_ENQUIRY_MASTER." (cont_id, name, phone , email, enq_title ,enq_detail,enq_type, enq_status, i_date) VALUES ('1','".$name."', '".$phone."', '".$email."','".$title."','".$subject."','0','0',NOW())";
		
		$res = $this->queryExecuter($sql_Login,$dbconn);

		if($res == 1)
		{		
			echo "Sucess";
			/*$objAoth->setCookie("userRegistrationsssss","1","");*/		
		}
		else
		{
			$objAoth->redirectToURL(1);exit;
		}
	}
	
	
	
	
		
}
?>