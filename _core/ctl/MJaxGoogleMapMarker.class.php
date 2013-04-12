<?php
class MJaxGoogleMapMarker extends MJaxControl{
	protected $fltLat = 0;
	protected $fltLng = 0;
	protected $strImg = null;
	protected $blnDraggable = false;
    protected $strAnimation = null;
	public function __construct($objParentControl, $mixData = null){
		if(
			(is_object($mixData)) &&
			($mixData instanceof MLCLocation)
		){
			$this->fltLat = $mixData->Lat;
			$this->fltLng = $mixData->Lng;			
			$strControlId = null;
		}else{
			$strControlId = $mixData;
		}
		parent::__construct($objParentControl, $strControlId);
		$this->objParentControl->Modified = true;
	}
	public function RenderMapJS(){
		$arrMarkerData = array(
			'strControlId'=>$this->strControlId,
			'lat' => $this->fltLat,
			'lng' => $this->fltLng,
			'draggable' => $this->blnDraggable
		);
		if(!is_null($this->strImg)){
			$arrMarkerData['icon'] = $this->strImg;
		}		
		if(!is_null($this->strImg)){
			$arrMarkerData['animation'] = $this->strAnimation;
		}
		$strJS = sprintf(
			'%s.AddMarker(%s);',
			$this->objParentControl->GetObjectPath(),
			json_encode($arrMarkerData)
		);
		
		
		foreach($this->arrEvents as $arrSubEvents){ 
            foreach($arrSubEvents as $objEvent){
                $strJS .= $objEvent->Render();
            }
        }
		return $strJS;
	}
	public function GetObjectPath(){
		 $strJS = sprintf(
			'%s.Markers["%s"]',
			$this->objParentControl->GetObjectPath(),
			$this->ControlId
		);
		return $strJS;
	}
	public function RenderJSCalls($blnAjaxFormating = false){
		
	}
	public function Remove(){
		$this->objForm->AddJSCall(
			sprintf(
				'%s.setMap(null);',
				$this->GetObjectPath()
			)
		);
		$this->objForm->AddJSCall(
			sprintf(
				'delete %s;',
				$this->GetObjectPath()
			)
		);
		parent::Remove();
	}
	 public function __get($strName) {
	    switch ($strName) {
	        
	        case ('Lat'):
	            return $this->fltLat;
	        break;
	        case ('Lng'):         
	            return $this->fltLng;
	        break;
			case ('Img'):         
	            return $this->strImg;
	        break;
			default:
               return parent::__get($strName);
            break;
	        
	    }
	}
    public function __set($strName, $strValue) {
        $this->blnModified = true;
        switch ($strName) {               
            case ('Lat'):
                return $this->fltLat = $strValue;
            break;
            case ('Lng'):
                return $this->fltLng = $strValue;
            break;
            case ('Img'):         
	            return $this->strImg = $strValue;
	        break;;
            default:
                return parent::__set($strName, $strValue);
            break;
        }
        
    }
}
