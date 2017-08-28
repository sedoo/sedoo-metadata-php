<?php
require_once("sedoo_metadata.php");

class sedoo_metadata_builder{

	var $dats;

	public function __construct($uuid, $datsTitle, $datsAbstract){
		$this->dats = new sedoo_metadata();
		$this->dats->uuid = $uuid;
		$this->dats->datsTitle = $datsTitle;
		$this->dats->datsAbstract = $datsAbstract;
	}

	public function french(){
		$this->dats->language = 'fr';
		return $this;
	}
	public function english(){
		$this->dats->language = 'en';
		return $this;
	}

	public function dataset(){
		$this->dats->resourceType = "dataset";
		return $this;
	}
	public function series(){
		$this->dats->resourceType = "series";
		return $this;
	}

	public function parentDataset($uuid){
		$this->dats->parentUuid = uuid;
		return this;
	}

	public function doi($doi){
		$this->dats->doi = $doi;
		return $this;
	}

	public function localIdentifier($localIdentifier){
		$this->dats->localIdentifier = $localIdentifier;
		return $this;
	}
		
	public function purpose($purpose){
		if ($this->dats->datsAbstract){
			$this->dats->datsPurpose = $purpose;
		}else{
			$this->dats->datsAbstract = $purpose;
		}
		return $this;
	}

	public function lineage($datsLineage){
		$this->dats->datsLineage = $datsLineage;
		return $this;
	}

	public function constraints( $datsUseConstraints, $datsAccessConstraints){
		$this->dats->datsAccessConstraints = $datsAccessConstraints;
		$this->dats->datsUseConstraints = $datsUseConstraints;
		return $this;
	}

	public function contact($c){
		$this->dats->contacts[] = $c;
		return $this;
	}

	public function metadataContact($c){
		$this->dats->metadataContacts[] = $c;
		return $this;
	}

	public function sedoo(){
		$cb = new sedoo_metadata_contact_builder();
		$cb->organisation("SEDOO")
		->email("admins@sedoo.fr")
		->distributor()
		->address("14 av. Edouard Belin", "31400", "Toulouse", "France");
		return $this->metadataContact($cb->build());
	}

	public function creationDate($date){
		$this->dats->creationDate = $date;
		return $this;
	}
	public function publicationDate($date){
		$this->dats->publicationDate = $date;
		return $this;
	}
	public function lastRevisionDate($date){
		$this->dats->lastRevisionDate = $date;
		return $this;
	}

	public function temporalExtent($dateBegin, $dateEnd){
		if ( isset($dateBegin) && !empty($dateBegin) ){
			$this->dats->dateBegin = $dateBegin;
		}
		if ( isset($dateEnd) && !empty($dateEnd) ){
			$this->dats->dateEnd = $dateEnd;
		}
		return $this;
	}

	public function boundings($latMin, $latMax, $lonMin, $lonMax){
		$this->dats->boundings = new sedoo_metadata_boundings($latMax, $lonMax, $latMin, $lonMin);
		return $this;
	}

	public function verticalExtent($altMin, $altMax){
		$this->dats->altMax = $altMax;
		$this->dats->altMin = $altMin;
		return $this;
	}

	public function point($lat, $lon){
		return $this->boundings($lat, $lat, $lon, $lon);
	}

	public function linkUrl($url, $label = null){
		return $this->resourceUrl(new sedoo_metadata_resource_link($url, $label, sedoo_metadata_resource_link::LINK_PROTOCOL));
	}
	
	public function aerisCalendarUrl($url, $label = null){
		return $this->resourceUrl(new sedoo_metadata_resource_link($url, $label, sedoo_metadata_resource_link::AERIS_CALENDAR_SERVICE));
	}

	public function downloadUrl($url, $label = null){
		return $this->resourceUrl(new sedoo_metadata_resource_link($url, $label, sedoo_metadata_resource_link::DOWNLOAD_PROTOCOL));
	}

	public function resourceUrl($resourceLink){
		$this->dats->urls[] = $resourceLink;
		return $this;
	}

	/* Keywords */

	public function atmosphere(){
		return $this->topicISO(sedoo_metadata_topics_iso::CLIM_METEO_ATMOS)->themeInspire(sedoo_metadata_themes_inspire::ATMOSPHERE);
	}

	public function ocean(){
		return $this->topicISO(sedoo_metadata_topics_iso::OCEAN)->themeInspire(sedoo_metadata_themes_inspire::OCEAN);
	}


	public function themeInspire($theme){
		$this->dats->themesInspire[] = $theme;
		return $this;
	}
	public function topicISO($topic){
		$this->dats->topicsISO[] = $topic;
		return $this;
	}

	public function themeKeyword($key){
		$this->dats->themeKeywords[] = $key;
		return $this;
	}
	public function placeKeyword($key){
		$this->dats->placeKeywords[] = $key;
		return $this;
	}
	public function disciplineKeyword($key){
		$this->dats->disciplineKeywords[] = $key;
		return $this;
	}
	public function project($pro){
		$this->dats->projects[] = $pro;
		return $this;
	}
	
	public function program($program){
		$this->dats->program = $program;
		return $this;
	}
	
	public function collection($collection){
		$this->dats->collection = $collection;
		return $this;
	}

	public function gcmdLocationKeyword($key){
		$this->dats->gcmdLocationKeywords [] = $key;
		return $this;
	}
	
	public function gcmdInstrumentKeyword($key){
		$this->dats->gcmdInstrumentKeywords [] = $key;
		return $this;
	}
	
	public function parameter($name, $gcmd, $unit){
		$this->dats->parameters [] = new sedoo_metadata_parameter($name, $gcmd, $unit);
		return $this;
	}
	public function platform($name, $gcmd, $boundings = null, $instruments = array (), $infos = null){
		$this->dats->platforms [] = new sedoo_metadata_platform($name, $gcmd, $boundings, $instruments, $infos);
		return $this;
	}
		
	public function format($format, $version = null){
		if ($format instanceof sedoo_metadata_format) {
			$this->dats->formats [] = $format;
		}else{
			$this->dats->formats [] = new sedoo_metadata_format($format, $version);
		}
		return $this;
	}

	public function logo($link){
		return thumbnail(link, "Logo");
	}

	public function dataPolicy($name, $url = null, $registrationNeeded = true){
		$this->dats->dataPolicy= new sedoo_metadata_data_policy($name, $url, $registrationNeeded);
		return $this;
	}
	
	public function thumbnail($link, $label = null){
		$this->dats->thumbnails[] = new sedoo_metadata_link_with_label($link, $label);
		return $this;
	}

	public function onGoing(){
		return $this->status("onGoing");
	}
	public function archive(){
		return $this->status("historicalArchive");
	}
	public function completed(){
		return $this->status("completed");
	}
	public function planned(){
		return $this->status("planned");
	}
	public function obsolete(){
		return $this->status("obsolete");
	}
	public function underDevelopment(){
		return $this->status("underDevelopment");
	}

	public function status($status){
		$this->dats->status = $status;
		return $this;
	}

	public function annualUpdate(){
		return $this->maintenance("annually");
	}
	public function monthlyUpdate(){
		return $this->maintenance("monthly");
	}
	public function dailyUpdate(){
		return $this->maintenance("daily");
	}
	public function biannualUpdate(){
		return $this->maintenance("biannually");
	}
	public function noUpdate(){
		return $this->maintenance("notPlanned");
	}
	public function continualUpdate(){
		return $this->maintenance("continual");
	}
	public function unknownUpdate(){
		return $this->maintenance("unknown");
	}
	public function asNeededUpdate(){
		return $this->maintenance("asNeeded");
	}
	public function irregularUpdate(){
		return $this->maintenance("irregular");
	}

	public function maintenance($updateRythm){
		$this->dats->updateRythm = $updateRythm;
		return $this;
	}

	public function build(){
		return $this->dats;
	}
}
?>