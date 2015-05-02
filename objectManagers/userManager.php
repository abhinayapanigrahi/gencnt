<?php

class userProfileManager{

	private $userid_;
	private $username_;
	private $password_;
	private $confpassword_;
	private $phone_;
	private $email_;
	private $fullname_;
	private $address_;
	private $dob_;
	private $doj_;
	private $lastloggedin_;
	private $profilepicture_;	
	private $userlanguageList = array();
	
	public function setUserLanguages($val) {
		$this->userlanguageList = $val;
	}
	public function getUserLanguages() {
		return $this->userlanguageList;
	}
	public function setUserId($val) {
		$this->userid_ = $val;
	}

	public function getUserId() {
		return $this->userid_;
	}
	
	public function setUserName($val) {
		$this->username_ = $val;
	}

	public function getUserName() {
		return $this->username_;
	}

	public function setPassword($val) {
		$this->password_ = $val;
	}

	public function getPassword() {
		return $this->password_;
	}
	
	public function setConfPassword($val) {
		$this->confpassword_ = $val;
	}

	public function getConfPassword() {
		return $this->confpassword_;
	}

	public function setPhone($val) {
		$this->phone_ = $val;
	}

	public function getPhone() {
		return $this->phone_;
	}
	
	public function setEmail($val) {
		$this->email_ = $val;
	}

	public function getEmail() {
		return $this->email_;
	}
	
	public function setFullName($val) {
		$this->fullname_ = $val;
	}

	public function getFullName() {
		return $this->fullname_;
	}
	
	public function setAddress($val) {
		$this->address_ = $val;
	}

	public function getAddress() {
		return $this->address_;
	}
	
	public function setDob($val) {
		$this->dob_ = $val;
	}

	public function getDob() {
		return $this->dob_;
	}

	public function setDoj($val) {
		$this->doj_ = $val;
	}

	public function getDoj() {
		return $this->doj_;
	}
	
	public function setLastLoggedin($val) {
		$this->lastloggedin_ = $val;
	}

	public function getLastLoggedin() {
		return $this->lastloggedin_;
	}
	
	public function setProfilePicture($val) {
		$this->profilepicture_ = $val;
	}

	public function getProfilePicture() {
		return $this->profilepicture_;
	}
}

class userLanguageManager{

	private $uid_;
	private $languageid_;
	
	
	
	public function setUserId($val) {
		$this->uid_ = $val;
	}

	public function getUserId() {
		return $this->uid_;
	}
	
	public function setLanguageID($val) {
		$this->languageid_ = $val;
	}

	public function getLanguageID() {
		return $this->languageid_;
	}

}

?>