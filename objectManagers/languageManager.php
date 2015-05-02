<?php
class languageManager{

	private $langid_;
	private $languageName_;
	
	public function setLanguageId($val) {
		$this->langid_ = $val;
	}

	public function getLanguageId() {
		return $this->langid_;
	}

	public function setLanguage($val) {
		$this->languageName_ = $val;
	}

	public function getLanguage() {
		return $this->languageName_;
	}
}

?>