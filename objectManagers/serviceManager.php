<?php
abstract class utilManager{
	public $User_;
	
	public function setUser($val) {
		$this->User_ = $val;
	}

	public function getUser() {
		return $this->User_;
	}
}

class serviceManager extends utilManager{

	private $serviceID_;
	private $serviceName_;
	private $serviceDesc_;
	private $status_;
	private $searchText_;
	private $countryID_;
	private $stateID_;
	private $area_;
		
	public function setServiceID($val) {
		$this->serviceID_ = $val;
	}
	public function getServiceID() {
		return $this->serviceID_;
	}

	public function setSearchText($val) {
		$this->searchText_ = $val;
	}
	public function getSearchText() {
		return $this->searchText_;
	}
	
	public function setServiceName($val) {
		$this->serviceName_ = $val;
	}
	public function getServiceName() {
		return $this->serviceName_;
	}

	public function setServiceDesc($val) {
		$this->serviceDesc_ = $val;
	}
	public function getServiceDesc() {
		return $this->serviceDesc_;
	}

	public function setStatus($val) {
		$this->status_ = $val;
	}
	public function getStatus() {
		switch($this->status_){
			case "disable":
				return 0;			
			break;
			case "enable":
				return 1;			
			break;
		}
		
	}
	
}

class postServiceManager extends utilManager{

	private $psID_ 				= array();
	private $serviceID_ 		= array();
	private $servicePrice_ 		= array();
	private $serviceUnit_ 		= array();
	private $serviceTime_ 		= array();
	private $serviceComment_ 	= array();
	private $hrs_;

	public function setPostedServiceID($val) {
		$this->psID_ = $val;
	}
	public function getPostedServiceID() {
		return $this->psID_;
	}
	public function setServiceID($val) {
		$this->serviceID_ = $val;
	}
	public function getServiceID() {
		return $this->serviceID_;
	}
	public function setServicePrice($val) {
		$this->servicePrice_ = $val;
	}
	public function getServicePrice() {
		return $this->servicePrice_;
	}
	public function setServiceUnit($val) {
		$this->serviceUnit_ = $val;
	}
	public function getServiceUnit() {
		return $this->serviceUnit_;
	}
	public function setServiceTime($val) {
		$this->serviceTime_ = $val;
	}
	public function getServiceTime() {
		return $this->serviceTime_;
	}
	public function setServiceComment($val) {
		$this->serviceComment_ = $val;
	}
	public function getServiceComment() {
		return $this->serviceComment_;
	}
	public function setHour($val) {
		$this->hrs_ = $val;
	}
	public function getHour() {
		return $this->hrs_;
	}
			
}

class serviceRatingManager extends utilManager{

	private $dalID_ 		= "";
	private $rate1_ 		= "";
	private $rate2_			= "";
	private $rate3_ 		= "";
	private $feedback_ 		= "";
	private $psid_ 			= "";
	

	public function setDealID($val) {
		$this->dalID_ = $val;
	}
	public function getDealID() {
		return $this->dalID_;
	}
	public function setRate1($val) {
		$this->rate1_ = $val;
	}
	public function getRate1() {
		return $this->rate1_;
	}
	public function setRate2($val) {
		$this->rate2_ = $val;
	}
	public function getRate2() {
		return $this->rate2_;
	}
	public function setRate3($val) {
		$this->rate3_ = $val;
	}
	public function getRate3() {
		return $this->rate3_;
	}
	public function setFeedback($val) {
		$this->feedback_ = $val;
	}
	public function getFeedback() {
		return $this->feedback_;
	}
	public function setPsID($val) {
		$this->psid_ = $val;
	}
	public function getPsID() {
		return $this->psid_;
	}
}

?>