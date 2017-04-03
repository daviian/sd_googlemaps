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
 * Module: TYPO3\CMS\SdGooglemaps\GoogleMapsLoader
 */

var google_maps_loaded_def = null;

define(['jquery'], function($) {
	'use strict';

	var GoogleMapsLoader = {
		selectorMap: '#map'
	};

	if(!google_maps_loaded_def) {
		google_maps_loaded_def = $.Deferred();

		window.google_maps_loaded = function() {
			google_maps_loaded_def.resolve(google.maps);
		}

		var libraryPath = $(GoogleMapsLoader.selectorMap).data('library');
		if (libraryPath.indexOf('?') > -1) {
			libraryPath += '&';
		} else {
			libraryPath += '?';
		}
		libraryPath += 'callback=google_maps_loaded';
		libraryPath += '&libraries=places';

		require([libraryPath],function(){},function(err) {
			google_maps_loaded_def.reject();
			//throw err; // maybe freak out a little?
		});
	}

	return google_maps_loaded_def.promise();
});
