<?php

require_once("sedoo_metadata_simple_project.php");

class sedoo_metadata_simple_project_builder{

	var $proj;
	
	public function __construct($uuid, $program){
		$this->proj = new sedoo_metadata_simple_project();
		$this->proj->uuid = $uuid;
		$this->proj->program = $program;
		$this->proj->datsTitleEn = $program;
		$this->proj->datsTitleFr = $program;
	}
	
	public function datsAbstract($datsAbstractFr, $datsAbstractEn){
		$this->proj->datsAbstractFr = $datsAbstractFr;
		$this->proj->datsAbstractEn = $datsAbstractEn;
		return $this;
	}
	
	public function contact($c){
		$this->proj->contacts[] = $c;
		return $this;
	}
	
	public function pointOfContact($name, $email, $organism = null){
		$builder = new sedoo_metadata_contact_builder($name);
		return $this->contact($builder->email($email)->organisation($organism)->pointOfContact()->build());
	}
	
	public function pi($name, $email, $organism = null){
		$builder = new sedoo_metadata_contact_builder($name);
		return $this->contact($builder->email($email)->organisation($organism)->pi()->build());
	}
	
	public function resourceUrl($resourceLink){
		$this->proj->urls[] = $resourceLink;
		return $this;
	}
		
	public function linkUrl($url, $label = null){
		return $this->resourceUrl(new sedoo_metadata_resource_link($url, $label, sedoo_metadata_resource_link::LINK_PROTOCOL));
	}
	
	public function downloadUrl($url, $label = null){
		return $this->resourceUrl(new sedoo_metadata_resource_link($url, $label, sedoo_metadata_resource_link::DOWNLOAD_PROTOCOL));
	}
	
	public function logo($link){
		return $this->thumbnail($link, "Logo");
	}
	
	public function thumbnail($link, $label = null){
		$this->proj->thumbnails[] = new sedoo_metadata_link_with_label($link, $label);
		return $this;
	}
	
	public function build(){
		return $this->proj;
	}
	
}

?>