<?php
class stateManager{

	private $countryid_;
	private $stateid_;	
	private $stateName_;
	
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
	
	public function setStateName($val) {
		$this->stateName_ = $val;
	}

	public function getStateName() {
		return $this->stateName_;
	}

}

?>