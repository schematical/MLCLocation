<?php
/**
* Class and Function List:
* Function list:
* Classes list:
* - MLCLocationEditPanel extends MLCLocationEditPanelBase
*/
require_once (__MLC_LOCATION_CORE_CTL__ . "/base_classes/MLCLocationEditPanelBase.class.php");
class MLCLocationEditPanel extends MLCLocationEditPanelBase {
    public $btnLLSave = null;
    public function __construct($objParentControl, $objMLCLocation = null) {
        parent::__construct($objParentControl, $objMLCLocation);
        $this->strTemplate = __MLC_LOCATION_CORE_VIEW__ . '/MLCLocationEditPanel.tpl.php';
        $this->btnLLSave = new MJaxButton($this);
        $this->btnLLSave->Text = 'Save Lat/Lng';
        $this->btnLLSave->AddAction($this, 'btnLLSave_click');
    }
    public function btnSave_click(){
        if (is_null($this->objMLCLocation)) {
            //Create a new one
            $this->objMLCLocation = new MLCLocation();
        }
        $this->objMLCLocation->shortDesc = $this->txtShortDesc->Text;
        $this->objMLCLocation->address1 = $this->txtAddress1->Text;
        $this->objMLCLocation->address2 = $this->txtAddress2->Text;
        $this->objMLCLocation->city = $this->txtCity->Text;
        $this->objMLCLocation->state = $this->txtState->Text;
        $this->objMLCLocation->zip = $this->txtZip->Text;
        $this->objMLCLocation->country = $this->txtCountry->Text;
        $this->objMLCLocation->idAccount = MLCAuthDriver::IdAccount();
        $this->objMLCLocation->GetLatLng();
        $this->objMLCLocation->Save();
        return $this->objMLCLocation;

    }
    public function btnLLSave_click(){
        $this->objMLCLocation->Lng = $this->txtLng->Text;
        $this->objMLCLocation->Lat = $this->txtLat->Text;
        $this->objMLCLocation->Save();
        return $this->objMLCLocation;
    }

}
?>