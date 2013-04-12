MJax.GoogleMapPanel = {
	Maps:{},
	InitMap:function(objSettings){
		MJax.GoogleMapPanel.Maps[objSettings.strControlId] = new MJax.GoogleMapPanel.MapObject(objSettings);
	},
	MapObject:function(objSettings){
		this.Markers = {};
		var objLatLng = new google.maps.LatLng(
      		objSettings.center.lat,
      		objSettings.center.lng
      	);
        var mapOptions = {
          zoom: objSettings.zoom,
          center: objLatLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        this.objGMap = new google.maps.Map(
        	document.getElementById(objSettings.strControlId),
            mapOptions
        );
	}
};



MJax.GoogleMapPanel.MapObject.prototype.InfoWindow = function(strHtml){
	var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
}
MJax.GoogleMapPanel.MapObject.prototype.AddMarker = function(objData){
	objLatLng = new google.maps.LatLng(
		objData.lat, objData.lng
	);
 	objData['position'] = objLatLng;
    objData['map'] = this.objGMap;
    this.Markers[objData.strControlId] = new google.maps.Marker(objData);
    return this.Markers[objData.strControlId];
}