function initMap() {
    var article = document.getElementById('coordinates');
    var originLatitude = parseFloat(article.dataset.originlatitude);
    var originLongitude = parseFloat(article.dataset.originlongitude);
    var destinationLatitude = parseFloat(article.dataset.destinationlatitude);
    var destinationLongitude = parseFloat(article.dataset.destinationlongitude);
    var flightLatitude = parseFloat(article.dataset.flightlatitude);
    var flightLongitude = parseFloat(article.dataset.flightlongitude);
    var centerLatitude = parseFloat((originLatitude + destinationLatitude) / 2);
    var centerLongitude = parseFloat((originLongitude + destinationLongitude) / 2);
    var flightOrigin = article.dataset.flightorigin;
    var flightDestination = article.dataset.flightdestination;
    var flightDepartureTime = article.dataset.flightdeparturetime;
    var flightArrivalTime = article.dataset.flightarrivaltime;
    var flightroute = JSON.parse(article.dataset.flightroute);

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 3,
        center: {lat: centerLatitude, lng: centerLongitude},
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        scrollwheel: false,
    });

    var flightPlaneCoordinates = [
        {lat: originLatitude, lng: originLongitude},
        {lat: destinationLatitude, lng: destinationLongitude}
    ];

    var flightPath = new google.maps.Polyline({
        path: flightPlaneCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 1
    });

    var currentFlightRoute = [];

    for (index = 0; index < flightroute.length; ++index) {
        currentFlightRoute.push({lat: flightroute[index].latitude, lng: flightroute[index].longitude});
    }

    var currentFlightPath = new google.maps.Polyline({
        path: currentFlightRoute,
        geodesic: true,
        strokeColor: '#0067d3',
        strokeOpacity: 1.0,
        strokeWeight: 2,
        icons: [{
            icon: {path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW},
            offset: '100%'
        }],
    });

    var contentString = '<div id="content">' +
        '<div id="siteNotice">' +
        '</div>' +
        '<h1 id="firstHeading" class="firstHeading">Flug von ' + flightOrigin + ' nach ' + flightDestination + '</h1>' +
        '<div id="bodyContent">' +
        '<ul>' +
        '<li>' +
        'Zeit Abflug: ' + new Date(flightDepartureTime * 1000) +
        '</li>' +
        '</ul></div>' +
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var originMarker = new google.maps.Marker({
        position: {lat: originLatitude, lng: originLongitude},
        map: map,
    });

    var destinationMarker = new google.maps.Marker({
        position: {lat: destinationLatitude, lng: destinationLongitude},
        map: map,
    });

    currentFlightPath.addListener('click', function () {
        infowindow.open(map, currentFlightPath);
    });

    flightPath.setMap(map);
    currentFlightPath.setMap(map);
}