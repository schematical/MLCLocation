<?php
class MJaxGoogleMapEvent extends MJaxEventBase{
	public function Render(){
        $strRendered = sprintf("google.maps.event.addListener(%s, '%s', %s);", $this->objControl->GetObjectPath(), $this->strEventName, $this->objAction->Render());
        $this->blnRendered = true;
        return $strRendered;
    }
	
}
class MJaxGoogleMapClickEvent extends MJaxGoogleMapEvent{
    protected $strEventName = 'click';	
}
class MJaxGoogleMapDblClickEvent extends MJaxGoogleMapEvent{
    protected $strEventName = 'dblclick';	
}
class MJaxGoogleMapMouseUpEvent extends MJaxGoogleMapEvent{
    protected $strEventName = 'mouseup';	
}
class MJaxGoogleMapMouseDownEvent extends MJaxGoogleMapEvent{
    protected $strEventName = 'mousedown';	
}
class MJaxGoogleMapMouseOverEvent extends MJaxGoogleMapEvent{
    protected $strEventName = 'mouseover';	
}
class MJaxGoogleMapMouseOutEvent extends MJaxGoogleMapEvent{
    protected $strEventName = 'mouseout';	
}
class MJaxCenterChangedEvent extends MJaxGoogleMapEvent{
    protected $strEventName = 'center_changed';	
}
class MJaxBoundsChangedEvent extends MJaxGoogleMapEvent{
    protected $strEventName = 'bounds_changed';	
}
class MJaxZoomChangedEvent extends MJaxGoogleMapEvent{
    protected $strEventName = 'zoom_changed';	
}

