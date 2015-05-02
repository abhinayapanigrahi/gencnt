<?php
class cityManager{

	private $countryid_;
	private $stateid_;	
	private $cityid_;
	private $cityName_;
	
	public function setCountryId($val) {
		$this->countryid_ = $val;
	}

	public function getCountryId() {
		return $this->countryid_;
	}

	public function setStateId($val) {
		$this->stateid_ = $val;
	}

	public function getStateId() {
		return $this->stateid_;
	}

	public function setCityId($val) {
		$this->cityid_ = $val;
	}

	public function getCityId() {
		return $this->cityid_;
	}
	
	public function setCityName ($val) {
		$this->cityName_ = $val;
	}

	public function getCityName() {
		return $this->cityName_;
	}

}

?>