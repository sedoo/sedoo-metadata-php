<?php

require_once("sedoo_metadata_contact.php");
require_once("sedoo_metadata_resource_link.php");
require_once("sedoo_metadata_link_with_label.php");

class sedoo_metadata_simple_project {

	public function __construct(){
	}

	var $uuid;
	var $program;
	
	var $datsTitleFr;
	var $datsAbstractFr;
	var $datsTitleEn;
	var $datsAbstractEn;
		
	var $contacts = array();
	
	var $urls = array();

	var $thumbnails = array();
}

?>