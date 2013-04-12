<?php
/**
* Class and Function List:
* Function list:
* Classes list:
* - MLCLocationEditPanel extends MLCLocationEditPanelBase
*/
require_once (__MLC_LOCATION_CORE_CTL__ . "/base_classes/MLCLocationEditPanelBase.class.php");
class MLCLocationEditPanel extends MLCLocationEditPanelBase {
    public function __construct($objParentControl, $objMLCLocation = null) {
        parent::__construct($objParentControl, $objMLCLocation);
        $this->strTemplate = __MLC_LOCATION_CORE_VIEW__ . '/MLCLocationEditPanel.tpl.php';
    }
    public function btnSave_click(){
        parent::btnSave_click();
        $this->objLocation->GetLatLng();
    }

}
?>