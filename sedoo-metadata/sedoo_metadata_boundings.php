<?php

class sedoo_metadata_boundings {
	var $north;
	var $south;
	var $east;
	var $west;
		
	public function __construct($north, $east, $south, $west) {
		$this->north = $north;
		$this->south = $south;
		$this->west = $west;
		$this->east = $east;
	}
}

?>