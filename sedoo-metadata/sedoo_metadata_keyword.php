<?php

class sedoo_metadata_keyword {

	var $name;
	var $gcmdKeyword;

	public function __construct($name, $gcmdKeyword) {
		$this->name = $name;
		$this->gcmdKeyword = $gcmdKeyword;
	}
}

class sedoo_metadata_parameter extends sedoo_metadata_keyword {

	var $unit;
	
	public function __construct($name, $gcmdKeyword, $unit) {
		parent::__construct($name, $gcmdKeyword);
		$this->unit = $unit;
	}
	
}

class sedoo_metadata_platform extends sedoo_metadata_keyword {

	var $boundings = null;
	var $instruments = array();
	var $infos = null;

	public function __construct($name, $gcmdKeyword, $boundings = null, $instruments = array(), $infos = null) {
		parent::__construct($name, $gcmdKeyword);
		$this->boundings = $boundings;
		$this->instruments = $instruments;
		$this->infos = $infos;
	}

}


?>