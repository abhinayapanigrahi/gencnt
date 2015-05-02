<?php
//$arrDBTaskManagement = array("db"=>"omdretailsoln_db","username"=>"root","password"=>"","host"=>"localhost");
//$arrDBClientManagement = array("db"=>"omdretailsoln_db","username"=>"root","password"=>"","host"=>"localhost");

//$arrDBTaskManagement = array("db"=>"genuine_db","username"=>"arya1406_dbuser","password"=>"Hanuman@27_dbuser","host"=>"localhost");
$arrDBTaskManagement = array("db"=>"genuine_db","username"=>"root","password"=>"","host"=>"localhost");


define(TABLE_USER_MASTER,"tbl_user_mst");
define(TABLE_CONTACT_MASTER,"tbl_contacts_mst");
define(TABLE_ENQUIRY_MASTER,"tbl_enquiry_mst");
define(TABLE_PRODUCT_MASTER,"tbl_product_mst");
define(TABLE_IMAGE_MASTER,"tbl_image_mst");
define(TABLE_SERVICES_MASTER,"tbl_service");
define(TABLE_POSTEDSERVICES_MASTER,"tbl_posteddservices");
define(TABLE_COUNTRY_MASTER,"tbl_country");
define(TABLE_STATE_MASTER,"tbl_state");
define(TABLE_CITY_MASTER,"tbl_city");
define(TABLE_LANGUAGE_MASTER,"tbl_language");
define(TABLE_LANGUAGE_USER_MAP,"tbl_language_user_map");
define(TABLE_DEAL_MASTER,"tbl_deal");
define(TABLE_DESIGNATION,"tbl_designation");
define(TABLE_ACCESS,"tbl_access");
define(TABLE_DESIG_ACCESS,"tbl_desig_access");


$messgaes['event_notavailable'] 		= "Currently No Events";
$messgaes['IMessage_notavailable'] 		= "You do not have any Message in your Inbox";
$messgaes['saleeport_noavailable'] 		= "No Sales Report Available";
$messgaes['dailyreport_noavailable'] 	= "No Daily Report Available";
$messgaes['users_noavailable'] 			= "No Users available";


$monthList = array("01"=>"Jan","02"=>"Feb","03"=>"Mar","04"=>"Apr","05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");

$IM_Priority 	= array(1=>"Higher",2=>"Medium",3=>"Lower");
$IM_State 		= array(1=>"New",2=>"Read",3=>"Trash",4=>"Deleted");
$StockistList	= array(1=>"Stockist1",2=>"Stockist2",3=>"Stockist3",4=>"Stockist4",5=>"Stockist5",6=>"Stockist6");

?>