
plugin.tx_sdgooglemaps_gm {
    view {
        # cat=plugin.tx_sdgooglemaps_gm/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:sd_googlemaps/Resources/Private/Templates/
        # cat=plugin.tx_sdgooglemaps_gm/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:sd_googlemaps/Resources/Private/Partials/
        # cat=plugin.tx_sdgooglemaps_gm/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:sd_googlemaps/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_sdgooglemaps_gm//a; type=string; label=Default storage PID
        storagePid =
    }
    settings {
        # cat=plugin.tx_sdgooglemaps_gm//a; type=string; label=Google Maps API Key
        apiKey =
        # cat=plugin.tx_sdgooglemaps_gm//a; type=string; label=Google Maps Library
        googleMapsLibrary = //maps.googleapis.com/maps/api/js
    }
}
