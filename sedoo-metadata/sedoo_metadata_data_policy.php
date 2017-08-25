<?php
require_once("sedoo_metadata_link_with_label.php");

class sedoo_metadata_data_policy extends sedoo_metadata_link_with_label{

	var $registrationNeeded;
	
	public function __construct($name, $url = null, $registrationNeeded = true) {
		parent::__construct($url, $name);
		$this->registrationNeeded = $registrationNeeded;
	}
}

?>