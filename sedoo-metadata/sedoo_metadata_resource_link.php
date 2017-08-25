<?php

class sedoo_metadata_resource_link {
	const LINK_PROTOCOL = "WWW:LINK-1.0-http--link";
	const DOWNLOAD_PROTOCOL = "WWW:DOWNLOAD-1.0-http--download";
	const WMS_SERVICE = "OGC:WMS";
	const WFS_SERVICE = "OGC:WFS";
	const WCS_SERVICE = "OGC:WCS";
	const AERIS_CALENDAR_SERVICE = "AERIS:CALENDAR";
	const DEFAULT_PROTOCOL = 'default';

	var $link;
	var $label;
	var $protocol;

	public function __construct($link, $label = null, $protocol = self::DEFAULT_PROTOCOL) {
		$this->link = $link;
		$this->label = $label;
		$this->protocol = $protocol;
	}
}

class sedoo_metadata_resource_link_builder {

	var $rl;

	public function __construct($link) {
		$this->rl = new sedoo_metadata_resource_link($link);
	}

	public function label($label){
		$this->rl->label = $label;
		return $this;
	}

	public function download(){
		return $this->protocol(sedoo_metadata_resource_link::DOWNLOAD_PROTOCOL);
	}

	public function link(){
		return $this->protocol(sedoo_metadata_resource_link::LINK_PROTOCOL);
	}

	public function wms(){
		return $this->protocol(sedoo_metadata_resource_link::WMS_SERVICE);
	}

	public function wfs(){
		return $this->protocol(sedoo_metadata_resource_link::WFS_SERVICE);
	}
	
	public function aerisCalendar(){
		return $this->protocol(sedoo_metadata_resource_link::AERIS_CALENDAR_SERVICE);
	}
	
	

	public function protocol($protocol){
		$this->rl->protocol = $protocol;
		return $this;
	}

	public function build(){
		return $this->rl;
	}


}

?>