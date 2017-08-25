<?php

class sedoo_metadata_format {

	var $name;
	var $version;

	public function __construct($name, $version = null) {
		$this->name = $name;
		$this->version = $version;
	}
}

?>