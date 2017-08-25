<?php

require_once("sedoo_metadata_contact.php");
require_once("sedoo_metadata_resource_link.php");
require_once("sedoo_metadata_format.php");
require_once("sedoo_metadata_themes_inspire.php");
require_once("sedoo_metadata_topics_iso.php");
require_once("sedoo_metadata_link_with_label.php");
require_once("sedoo_metadata_data_policy.php");
require_once("sedoo_metadata_keyword.php");
require_once("sedoo_metadata_boundings.php");

class sedoo_metadata{

	public function __construct(){
		$this->language = 'en';
		$this->resourceType = "dataset";
	}

	var $uuid;
	var $doi;
	var $language;
	var $resourceType;

	var $parentUuid;

	var $localIdentifier;

	var $datsTitle;
	var $datsAbstract;
	var $datsPurpose;
	var $datsLineage;
	var $datsUseConstraints;
	var $datsAccessConstraints;

	var $dataPolicy;
	
	var $status;
	var $updateRythm;

	var $creationDate;
	var $publicationDate;
	var $lastRevisionDate;

	var $dateBegin;
	var $dateEnd;

	var $contacts = array();
	var $metadataContacts = array();

	var $urls = array();

	var $themesInspire = array();
	var $topicsISO = array();

	var $gcmdLocationKeywords = array();
	var $gcmdInstrumentKeywords = array();
	var $platforms = array();
	var $parameters = array();

	var $themeKeywords = array();
	var $placeKeywords = array();
	var $disciplineKeywords = array();

	var $projects = array();
	var $program;
	var $collection;
	
	var $formats = array();
	
	var $boundings;

	var $altMin;
	var $altMax;

	var $thumbnails = array();
}

?>