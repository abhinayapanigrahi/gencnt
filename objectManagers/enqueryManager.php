<?php
class enqueryManager{

	private $name_;
	private $phone_;
	private $email_;
	private $title_;
	private $subject_;
	
	public function setName($val) {
		$this->name_ = $val;
	}

	public function getName() {
		return $this->name_;
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
	
	public function setTitle($val) {
		$this->title_ = $val;
	}

	public function getTitle() {
		return $this->title_;
	}
	
	public function setSubject($val) {
		$this->subject_ = $val;
	}

	public function getSubject() {
		return $this->subject_;
	}
}

?>