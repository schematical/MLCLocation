<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - CreateContentControls()
* - CreateFieldControls()
* - CreateReferenceControls()
* - btnSave_click()
* - btnDelete_click()
* - IsNew()
* Classes list:
* - MLCLocationEditPanelBase extends MJaxPanel
*/
class MLCLocationEditPanelBase extends MJaxPanel {
    protected $objMLCLocation = null;
    public $intIdLocation = null;
    public $txtShortDesc = null;
    public $txtAddress1 = null;
    public $txtAddress2 = null;
    public $txtCity = null;
    public $txtState = null;
    public $txtZip = null;
    public $txtCountry = null;
    public $txtLat = null;
    public $txtLng = null;
    public $txtIdAccount = null;
    public $lnkViewParentMLCLocation = null;
    //Regular controls
    public $btnSave = null;
    public $btnDelete = null;
    public function __construct($objParentControl, $objMLCLocation = null) {
        parent::__construct($objParentControl);
        $this->objMLCLocation = $objMLCLocation;
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/ctl_panels/MLCLocationEditPanelBase.tpl.php';
        $this->CreateFieldControls();
        $this->CreateContentControls();
        $this->CreateReferenceControls();
    }
    public function CreateContentControls() {
        $this->btnSave = new MJaxButton($this);
        $this->btnSave->Text = 'Save';
        $this->btnSave->AddAction(new MJaxClickEvent() , new MJaxServerControlAction($this, 'btnSave_click'));
        $this->btnDelete = new MJaxButton($this);
        $this->btnDelete->Text = 'Delete';
        $this->btnDelete->AddAction(new MJaxClickEvent() , new MJaxServerControlAction($this, 'btnDelete_click'));
        if (is_null($this->objMLCLocation)) {
            $this->btnDelete->Style->Display = 'none';
        }
    }
    public function CreateFieldControls() {
        $this->txtShortDesc = new MJaxTextBox($this);
        $this->txtShortDesc->Name = 'shortDesc';
        $this->txtAddress1 = new MJaxTextBox($this);
        $this->txtAddress1->Name = 'address1';
        $this->txtAddress2 = new MJaxTextBox($this);
        $this->txtAddress2->Name = 'address2';
        $this->txtCity = new MJaxTextBox($this);
        $this->txtCity->Name = 'city';
        $this->txtState = new MJaxTextBox($this);
        $this->txtState->Name = 'state';
        $this->txtZip = new MJaxTextBox($this);
        $this->txtZip->Name = 'zip';
        $this->txtCountry = new MJaxTextBox($this);
        $this->txtCountry->Name = 'country';
        $this->txtLat = new MJaxTextBox($this);
        $this->txtLat->Name = 'lat';
        $this->txtLng = new MJaxTextBox($this);
        $this->txtLng->Name = 'lng';
        $this->txtIdAccount = new MJaxTextBox($this);
        $this->txtIdAccount->Name = 'idAccount';
        if (!is_null($this->objMLCLocation)) {
            $this->intIdLocation = $this->objMLCLocation->idLocation;
            $this->txtShortDesc->Text = $this->objMLCLocation->shortDesc;
            $this->txtAddress1->Text = $this->objMLCLocation->address1;
            $this->txtAddress2->Text = $this->objMLCLocation->address2;
            $this->txtCity->Text = $this->objMLCLocation->city;
            $this->txtState->Text = $this->objMLCLocation->state;
            $this->txtZip->Text = $this->objMLCLocation->zip;
            $this->txtCountry->Text = $this->objMLCLocation->country;
            $this->txtLat->Text = $this->objMLCLocation->lat;
            $this->txtLng->Text = $this->objMLCLocation->lng;
            $this->txtIdAccount->Text = $this->objMLCLocation->idAccount;
        }
    }
    public function CreateReferenceControls() {
        if (!is_null($this->objMLCLocation->idAccount)) {
            $this->lnkViewParentMLCLocation = new MJaxLinkButton($this);
            $this->lnkViewParentMLCLocation->Text = 'View AuthAccount';
            $this->lnkViewParentMLCLocation->Href = __ENTITY_MODEL_DIR__ . '/AuthAccount/' . $this->objMLCLocation->idAccount;
        }
        // if(!is_null($this->objMLCLocation->i)){
        // }
        
    }
    public function btnSave_click() {
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
        $this->objMLCLocation->lat = $this->txtLat->Text;
        $this->objMLCLocation->lng = $this->txtLng->Text;
        $this->objMLCLocation->idAccount = $this->txtIdAccount->Text;
        $this->objMLCLocation->Save();
    }
    public function btnDelete_click() {
        $this->objMLCLocation->Delete();
    }
    public function IsNew() {
        return is_null($this->objMLCLocation);
    }
}
?>