var map;
var geocoder;
var marker;
var markers = [];
var infowindow = new google.maps.InfoWindow();
var directionsDisplays = [];
var directionsService = new google.maps.DirectionsService();
function initialize() {
	geocoder = new google.maps.Geocoder();
	mapOptions = {
		mapTypeControl: true,
		mapTypeControlOptions: { style: google.maps.MapTypeControlStyle.DROPDOWN_MENU },
		zoomControl: true,
		zoom: 14,
		minZoom: 12,
		maxZoom: 20,
		center: new google.maps.LatLng(-6.911199, 107.6097161)
	}
	map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
	//Add listener
	google.maps.event.addListener(map, "click", function (event) {
		if(marker!=null){
			removeMarker();
		}
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(event.latLng.lat(),event.latLng.lng()),
			map: map,
			title: 'Jejak'
		});
		codeLatLng(event.latLng.lat(),event.latLng.lng());
		$("#lat").html(event.latLng.lat());
		$("#lng").html(event.latLng.lng());
		$("#latitude").val(event.latLng.lat());
		$("#longitude").val(event.latLng.lng());
	});
	//add markers
	for(var i=0;i<lats.length;i++){
		addMarker(lats[i],lngs[i]);
	}
	markers[markers.length-1].setAnimation(google.maps.Animation.BOUNCE);
	//show routes prediction
	if(markers.length>1){
		for(var i=1;i<markers.length;i++){
			calcRoute(markers[i-1].getPosition(),markers[i].getPosition());
		}
	}
}
function addMarker(lat,lng){
	var cmarker = new google.maps.Marker({
		position: new google.maps.LatLng(lat,lng),
		map: map
	});
	markers.push(cmarker);
}
function removeMarker() {
	marker.setMap(null);
}
function codeLatLng(lat,lng) {
	var latlng = new google.maps.LatLng(lat, lng);
	geocoder.geocode({'latLng': latlng}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			if (results[1]) {
				map.setZoom(15);
				infowindow.setContent(results[1].formatted_address);
				infowindow.open(map, marker);
				$("#lokasi").val(results[1].formatted_address);
			} else {
				alert('No results found');
			}
		} else {
			alert('Geocoder failed due to: ' + status);
		}
	});
}
function calcRoute(start,end) {
	var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
	var request = {
      origin:start,
      destination:end,
      travelMode: google.maps.TravelMode.DRIVING
	};
	directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(response);
		}
	});
	directionsDisplays.push(directionsDisplay);
	directionsDisplay.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);