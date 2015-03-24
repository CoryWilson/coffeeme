function initialize() {
	var lat = 28.5928987;
	var lng = -81.305375;
	var mapOptions = {
	  center: { lat: lat, lng: lng},
	  zoom: 12
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'),
	    mapOptions);

	var myLatlng = new google.maps.LatLng(lat,lng);

	var marker = new google.maps.Marker({
	    position: myLatlng,
	    map: map,
	    title:"Hello World!"
	});
	
	marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

//window resize reload with jquery