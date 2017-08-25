<?php

define('SEDOO_METADATA_SERVICES_URL','http://catalogue.sedoo.fr/metadata-services/');

//Json to Xml
define('SEDOO_METADATA_SERVICES_JSON_TO_ISO',SEDOO_METADATA_SERVICES_URL.'json/toIso');

//Xml to Json
define('SEDOO_METADATA_SERVICES_ISO_TO_JSON',SEDOO_METADATA_SERVICES_URL.'iso/toJson');

#Aeris
define('SEDOO_METADATA_SERVICES_JSON_TO_AERIS_COLLECTION',SEDOO_METADATA_SERVICES_URL.'aeris/toCollection');
define('SEDOO_METADATA_SERVICES_JSON_TO_AERIS_PROGRAM',SEDOO_METADATA_SERVICES_URL.'aeris/project/toProgram');

define('SEDOO_METADATA_SERVICES_JSON_TO_AERIS_DEPOT',SEDOO_METADATA_SERVICES_URL.'aeris/toAerisDepot');
define('SEDOO_METADATA_SERVICES_PROJECT_TO_AERIS_DEPOT',SEDOO_METADATA_SERVICES_URL.'aeris/project/toAerisDepot');

define('SEDOO_METADATA_SERVICES_ELASTIC', SEDOO_METADATA_SERVICES_URL.'elastic');

?>