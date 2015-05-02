<?php
class AreaManager{

	private $cityid_;
	private $areaid_;
	private $areaname_;
	private $landmark_;
	private $pincode_;		

	
	public function setCityId($val) {
		$this->cityid_ = $val;
	}

	public function getCityId() {
		return $this->cityid_;
	}
	
	public function setAreaId($val) {
		$this->areaid_ = $val;
	}

	public function getAreaId() {
		return $this->areaid_;
	}
	
	
	public function setAreaName($val) {
		$this->areaname_ = $val;
	}

	public function getAreaName() {
		return $this->areaname_;
	}
	
	public function setLandmark($val) {
		$this->landmark_ = $val;
	}

	public function getLandmark() {
		return $this->landmark_;
	}
	
	public function setPincode($val) {
		$this->pincode_ = $val;
	}

	public function getPincode() {
		return $this->pincode_;
	}
	
	
}

?>