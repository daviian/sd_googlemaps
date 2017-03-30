var map;

function initMap() {
	// Create the map with given options
	map = new google.maps.Map(document.getElementById('map'), sdGooglemaps.options);

	// Calculate bounds to fit all markers into viewport
	if (sdGooglemaps.options.center === null) {
		var latLngBounds = new google.maps.LatLngBounds();
		sdGooglemaps.markers.forEach(function(marker) {
			latLngBounds.extend(marker.position);
		});
		map.fitBounds(latLngBounds);
	}

	// Add markers to map
	sdGooglemaps.markers.forEach(function(marker) {
		var newMarker = new google.maps.Marker({
			title: marker.title,
			position: marker.position,
			icon: marker.icon,
			map: map
		});

		// Add an infowindow for marker
		if (marker.bodytext) {
			var infoWindow = new google.maps.InfoWindow({
				content: marker.bodytext
			});
			// Register Click Handler
			newMarker.addListener('click', function() {
				infoWindow.open(map, newMarker);
			});
		}
	});
}
