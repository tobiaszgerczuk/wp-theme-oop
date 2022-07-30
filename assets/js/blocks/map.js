google.maps.event.addDomListener( window, 'load', initMap );

function initMap() {
    var mapContainer = document.getElementById('map');
    var options = {
        zoom: Number( mapContainer.dataset.zoom ),
        center: {
            lat: Number( mapContainer.dataset.latidude ),
            lng: Number( mapContainer.dataset.longtude )
        }
    }
    var map = new google.maps.Map( mapContainer, options );
    var marker = new google.maps.Marker({
        position: {
            lat: Number( mapContainer.dataset.latidude ),
            lng: Number( mapContainer.dataset.longtude )
        },
        map:         map,
        icon:        WLC.icon,
        draggarble: true
    });
}