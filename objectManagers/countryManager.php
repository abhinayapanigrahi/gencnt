<?php
class CountryManager{

	private $countryid_;
	private $countryname_;
	private $countryshortname_;	
	
	public function setCountryId($val) {
		$this->countryid_ = $val;
	}

	public function getCountryId() {
		return $this->countryid_;
	}
	
	public function setCountryName($val) {
		$this->countryname_ = $val;
	}

	public function getCountryName() {
		return $this->countryname_;
	}

	public function setCountryShortName($val) {
		$this->countryshortname_ = $val;
	}

	public function getCountryShortName() {
		return $this->countryshortname_;
	}
	
	
}

?>