<?php
class MJaxGoogleMapPanel extends MJaxPanel{
	public $fltCenterLat = null;
	public $fltCenterLng = null;
	public $fltZoom = null;
	public function __construct($objParentControl, $mixData = null){
		
		if(
			(is_object($mixData)) &&
			($mixData instanceof MLCLocation)
		){
			$this->fltCenterLat = $mixData->Lat;
			$this->fltCenterLng = $mixData->Lng;
			$this->fltZoom = 8;//Because IDK
			$strControlId = null;
		}else{
			$strControlId = $mixData;
		}
		parent::__construct($objParentControl, $strControlId);
		$this->objForm->AddHeaderAsset(new MJaxJSHeaderAsset('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'));
		$this->objForm->AddHeaderAsset(new MJaxJSHeaderAsset(
			MLCApplication::GetAssetUrl('/js/MJax.GoogleMapPanel.js', 'MLCLocation')
		));

		
	}
	public function RemoveAllChildren(){
		foreach($this->arrChildControls as $intIndex => $ctlChild){
			$ctlChild->Remove();
			unset($this->arrChildControls[$intIndex]);
		}
	}
	public function SetCenter($mixLat, $fltLng = null, $fltZoom = 8){
		if(
			(is_object($mixLat)) &&
			($mixLat instanceof MLCLocation)
		){
			$fltLat = $mixLat->Lat;
			$fltLng = $mixLat->Lng;
		}else{
			$fltLat = $mixLat;
		}
		$this->fltCenterLat = $fltLat;
		$this->fltCenterLng = $fltLng;
		$this->fltZoom = $fltZoom;
		
	}
	public function GetSettings($arrSettings = array()){
		$arrSettings['strControlId'] = $this->strControlId;
		$arrSettings['center'] = array(
			'lat'=>$this->fltCenterLat,
			'lng'=>$this->fltCenterLng
		);
		$arrSettings['zoom'] = $this->fltZoom;
		return $arrSettings;
	}
	public function Render($blnPrint = true, $blnRenderAsAjax = false){
		
		
		if(!$blnRenderAsAjax){
			$strHtml = parent::Render(false, $blnRenderAsAjax);
			$strHtml .= '<script>';
			$strHtml .= $this->RenderMapJS(false, $blnRenderAsAjax);
			$strHtml .= '</script>';
		}else{
			$strHtml = '';
			
			$this->objForm->AddJSCall($this->RenderMapJS(false,$blnRenderAsAjax));
		}
		if($blnPrint){
			echo $strHtml;
		}
		
		return $strHtml;
	}
	public function RenderMapJS($blnPrint = true, $blnRenderAsAjax = false){
		$arrSettings = $this->GetSettings();
		$strHtml ='';
		if(!$blnRenderAsAjax){
			$strHtml .= "google.maps.event.addDomListener(window, 'load', function(){";
			$strHtml .= sprintf(
				'MJax.GoogleMapPanel.InitMap(%s);',			
				json_encode($arrSettings)
			);
		}
		foreach($this->arrChildControls as $intIndex => $objChildControl){
			$strHtml .= $objChildControl->RenderMapJS(false) . "\n";
		}
		if(!$blnRenderAsAjax){
			$strHtml .= '});';
		}
		if($blnPrint){
			echo $strHtml;
		}
		//die($strHtml);
		return $strHtml;
	}
	public function RenderJS(){
		
	}
	public function GetObjectPath(){
		$strJS = sprintf(
			'MJax.GoogleMapPanel.Maps["%s"]',
			$this->ControlId
		);
		return $strJS;
	}
	
}
