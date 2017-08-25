<?php

require_once("sedoo_metadata_conf.php");

function sedooMetadataToJson($dataset, $service = null) {
	if (isset ( $dataset )) {
		
		if ($service == null) {
			echo nl2br(json_encode($dataset, JSON_PRETTY_PRINT));
		} else {
			$json = json_encode ( $dataset );
			$c = curl_init ( $service );
			curl_setopt ( $c, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $c, CURLOPT_POST, true );
			curl_setopt ( $c, CURLOPT_HTTPHEADER, array (
					'Content-type: application/json' 
			) );
			curl_setopt ( $c, CURLOPT_POSTFIELDS, $json );
			$result = curl_exec ( $c );
			if ($result === false) {
				echo 'ERROR: ' . curl_error ( $c );
			} else {
				echo $result;
			}
			curl_close ( $c );
		}
	}
}

function sedooMetadataToIso($dataset){
	sedooMetadataToJson($dataset, SEDOO_METADATA_SERVICES_JSON_TO_ISO);
}

function sedooMetadataToAerisDepot($dataset){
	sedooMetadataToJson($dataset, SEDOO_METADATA_SERVICES_JSON_TO_AERIS_DEPOT);
}

function sedooMetadataToAerisCollection($dataset){
	sedooMetadataToJson($dataset, SEDOO_METADATA_SERVICES_JSON_TO_AERIS_COLLECTION);
}

function sedooProjectToAerisProgram($project){
	sedooMetadataToJson($project, SEDOO_METADATA_SERVICES_JSON_TO_AERIS_PROGRAM);
}

function sedooProjectToAerisDepot($project){
	sedooMetadataToJson($project, SEDOO_METADATA_SERVICES_PROJECT_TO_AERIS_DEPOT);
}

function xmlIsoToSedooMetadata($xmlFile){
	$c = curl_init(SEDOO_METADATA_SERVICES_ISO_TO_JSON);
	$xml = file_get_contents($xmlFile);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
	curl_setopt($c, CURLOPT_POSTFIELDS, $xml);
	$result = curl_exec($c);
	if ($result === false){
		echo 'ERROR: '.curl_error($c);
	}else{
		return json_decode($result);
	}
	curl_close($c);
	return null;
}

//??
function sedooMetadataIndexDataset($indexName, $dataset){
	if (isset($dataset)){
		$json = json_encode($dataset);
		//echo SEDOO_METADATA_SERVICES_ELASTIC."/$indexName";
		$c = curl_init(SEDOO_METADATA_SERVICES_ELASTIC."/indexDataset/$indexName");
		$opts = $json;
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
		curl_setopt($c, CURLOPT_POSTFIELDS, $opts);
		$result = curl_exec($c);
		if ($result === false){
			echo 'ERROR: '.curl_error($c);
		}else{
			echo $result;
		}
		curl_close($c);
	}
}






?>