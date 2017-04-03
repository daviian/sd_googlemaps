/***
 *
 * This file is part of the "Google Maps" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 David Schneiderbauer <david.schneiderbauer@dschneiderbauer.me>
 *
 ***/

/**
 * Module: TYPO3\CMS\SdGooglemaps\GoogleMapsPicker
 */
define(['jquery', 'TYPO3/CMS/SdGooglemaps/GoogleMapsLoader'], function($, GoogleMapsLoader) {
	'use strict';

	/**
	 * The main ContextHelp object
	 *
	 * @type {{selectorEditor: string, selectorAddColumn: string, selectorRemoveColumn: string, selectorAddRow: string, selectorRemoveRow: string, selectorLinkEditor: string, selectorLinkExpandRight: string, selectorLinkShrinkLeft: string, selectorLinkExpandDown: string, selectorLinkShrinkUp: string, selectorDocHeaderSave: string, selectorDocHeaderSaveClose: string, selectorConfigPreview: string, selectorConfigPreviewButton: string, colCount: number, rowCount: number, field: string, data: Array, nameLabel: string, columnLabel: string, targetElement: null}}
	 * @exports TYPO3\CMS\SdGooglemaps\GoogleMapsPicker
	 */
	var GoogleMapsPicker = {
		selectorMap: '#map',
		selectorLatitude: 'input[name*="latitude"],input[data-formengine-input-name*="latitude"]',
		selectorLongitude: 'input[name*="longitude"],input[data-formengine-input-name*="longitude"]',
		map: null,
		marker: null
	};

	/**
	 *
	 * @param {Object} config
	 */
	GoogleMapsPicker.initialize = function() {
		var $element = $(GoogleMapsPicker.selectorMap);

		var center = GoogleMapsPicker.getPosition() || GoogleMapsPicker.getDefaultCenter();
		var zoom = parseInt($element.data('zoom')) || 16;

		var latlng = new google.maps.LatLng(center.lat, center.lng);

		// Create the map with given options
		GoogleMapsPicker.map = new google.maps.Map($element.get(0), {
			zoom: zoom,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		GoogleMapsPicker.setCenter();
		GoogleMapsPicker.initListener();
	};

	GoogleMapsPicker.initListener = function() {
		GoogleMapsPicker.map.addListener('click', function(event) {
			if (event.placeId) {
				event.stop();
			}

			GoogleMapsPicker.setPosition(event.latLng);
			GoogleMapsPicker.writePosition();
		});
	}

	GoogleMapsPicker.setCenter = function() {
		var savedPosition = GoogleMapsPicker.getPosition();
		if (savedPosition !== null && !isNaN(savedPosition.lat) && !isNaN(savedPosition.lng)) {
			var latLng = new google.maps.LatLng(savedPosition.lat, savedPosition.lng);
			GoogleMapsPicker.setPosition(latLng);

			var latLngBounds = new google.maps.LatLngBounds();
			latLngBounds.extend(GoogleMapsPicker.marker.position);
			GoogleMapsPicker.map.fitBounds(latLngBounds);
		} else {
			GoogleMapsPicker.getGeolocation();
		}
	};

	GoogleMapsPicker.getGeolocation = function() {
		if (!navigator.geolocation) {
			return;
		}
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};

			GoogleMapsPicker.map.setCenter(pos);
		});
	};

	GoogleMapsPicker.getDefaultCenter = function() {
		var $element = $(GoogleMapsPicker.selectorMap);
		var defaultCenter = {
			lat: parseFloat($element.data('center')),
			lng: parseFloat($element.data('center'))
		};
		var fallbackCenter = {
			lat: -34.397,
			lng: 150.644
		};

		return (!isNaN(defaultCenter.lat) && !isNaN(defaultCenter.lng)) ? defaultCenter : fallbackCenter;
	}

	GoogleMapsPicker.setPosition = function(latLng) {
		if (GoogleMapsPicker.marker === null) {
			GoogleMapsPicker.marker = new google.maps.Marker({
				position: latLng,
				map: GoogleMapsPicker.map
			});
		}

		GoogleMapsPicker.marker.setPosition(latLng);
	};

	GoogleMapsPicker.getPosition = function() {
		var position = {
			lat: parseFloat($(GoogleMapsPicker.selectorLatitude).val()),
			lng: parseFloat($(GoogleMapsPicker.selectorLongitude).val())
		}

		return (!isNaN(position.lat) && !isNaN(position.lng)) ? position : null;
	};

	GoogleMapsPicker.writePosition = function() {
		var $latElement = $(GoogleMapsPicker.selectorLatitude);
		var $lngElement = $(GoogleMapsPicker.selectorLongitude);

		$latElement.val(GoogleMapsPicker.marker.getPosition().lat());
		$latElement.change();
		$lngElement.val(GoogleMapsPicker.marker.getPosition().lng());
		$lngElement.change();
	};

	GoogleMapsLoader.done(function() {
		GoogleMapsPicker.initialize();
	});
	return GoogleMapsPicker;
});
