<?php
/**
* Class and Function List:
* Function list:
* Classes list:
* - MLCLocation extends MLCLocationBase
*/
require_once (__MLC_LOCATION_CORE_MODEL__ . "/data_layer/base_classes/MLCLocationBase.class.php");
class MLCLocation extends MLCLocationBase {
    const XML = 'xml';
    const KML = 'kml';
    const CSV = 'csv';
    const JSON = 'json';
    //200 	G_GEO_SUCCESS 	No errors occurred; the address was successfully parsed and its geocode was returned.
    const G_GEO_SUCCESS = 200;
    //500 	G_GEO_SERVER_ERROR 	A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is unknown.
    const G_GEO_SERVER_ERROR = 500;
    //601 G_GEO_MISSING_QUERY 	An empty address was specified in the HTTP q parameter.
    const G_GEO_MISSING_QUERY = 601;
    //602 	G_GEO_UNKNOWN_ADDRESS 	No corresponding geographic location could be found for the specified address, possibly because the address is relatively new, or because it may be incorrect.
    const G_GEO_UNKNOWN_ADDRESS = 602;
    //603 	G_GEO_UNAVAILABLE_ADDRESS 	The geocode for the given address or the route for the given directions query cannot be returned due to legal or contractual reasons.
    const G_GEO_UNAVAILABLE_ADDRESS = 603;
    //610 	G_GEO_BAD_KEY 	The given key is either invalid or does not match the domain for which it was given.
    const G_GEO_BAD_KEY = 610;
    //620 	G_GEO_TOO_MANY_QUERIES 	The given key has gone over the requests limit in the 24 hour period or has submitted too many requests in too short a period of time. If you're sending multiple requests in parallel or in a tight loop, use a timer or pause in your code to make sure you don't send the requests too quickly.
    const G_GEO_TOO_MANY_QUERIES = 620;
		 
	 public function GetLatLng(){
        //*  q (required) — The address that you want to geocode. Note that this address must be encoded in UTF-8.*
        $strQuery = $this->Address1;
        if(!is_null($this->Address2)){
            $strQuery .= " " . $this->Address2;
        }
        $strQuery .= sprintf(" %s, %s %s", $this->City, $this->State, $this->Zip);
        
        //* key (required) — Your API key.
       // $strKey = __GOOGLE_API_KEY__;
        $strSensor = 'false';
        
        $strUrl = 'http://maps.googleapis.com/maps/api/geocode/json?' ;
        $strUrl .= "address=". urlencode($strQuery) . "&";        
        $strUrl .= "sensor=" . $strSensor . "&";
		//die($strUrl);
        $objCurl = curl_init();
		curl_setopt($objCurl, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($objCurl, CURLOPT_URL, $strUrl);
		$strReturn = curl_exec($objCurl);
		
		//_dp($strReturn);
		$arrData = json_decode($strReturn, true);
		if(json_last_error() != JSON_ERROR_NONE){
			return false;
		}
		if(count($arrData['results']) == 0){
            return false;//throw new Exception("No geo data found - Query: " . $strQuery);
        }
		$arrAddress = $arrData['results'][0];
		
		$this->Lat = $arrAddress['geometry']['location']['lat'];
		$this->Lng = $arrAddress['geometry']['location']['lng'];

        return true;

    }
}
?>