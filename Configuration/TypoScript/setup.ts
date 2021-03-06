
plugin.tx_sdgooglemaps_gm {
	view {
		templateRootPaths.0 = EXT:sd_googlemaps/Resources/Private/Templates/
		templateRootPaths.1 = {$plugin.tx_sdgooglemaps_gm.view.templateRootPath}
		partialRootPaths.0 = EXT:sd_googlemaps/Resources/Private/Partials/
		partialRootPaths.1 = {$plugin.tx_sdgooglemaps_gm.view.partialRootPath}
		layoutRootPaths.0 = EXT:sd_googlemaps/Resources/Private/Layouts/
		layoutRootPaths.1 = {$plugin.tx_sdgooglemaps_gm.view.layoutRootPath}
	}
	persistence {
		storagePid = {$plugin.tx_sdgooglemaps_gm.persistence.storagePid}
		#recursive = 1
	}
	features {
		#skipDefaultArguments = 1
		# if set to 1, the enable fields are ignored in BE context
		ignoreAllEnableFieldsInBe = 0
		# Should be on by default, but can be disabled if all action in the plugin are uncached
		requireCHashArgumentForActionArguments = 1
	}
	mvc {
		#callDefaultActionIfActionCantBeResolved = 1
	}
	settings {
		apiKey = {$plugin.tx_sdgooglemaps_gm.settings.apiKey}
		googleMapsLibrary = {$plugin.tx_sdgooglemaps_gm.settings.googleMapsLibrary}

		backend {
			center {
				lat = {$plugin.tx_sdgooglemaps_gm.settings.backend.center.lat}
				lng = {$plugin.tx_sdgooglemaps_gm.settings.backend.center.lng}
			}
			zoom = {$plugin.tx_sdgooglemaps_gm.settings.backend.zoom}
		}
	}
}
