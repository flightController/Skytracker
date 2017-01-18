function initMap() {
    var article = document.getElementById('coordinates');
    var originLatitude = parseFloat(article.dataset.originlatitude);
    var originLongitude = parseFloat(article.dataset.originlongitude);
    var destinationLatitude = parseFloat(article.dataset.destinationlatitude);
    var destinationLongitude = parseFloat(article.dataset.destinationlongitude);
    var flightLatitude = parseFloat(article.dataset.flightlatitude);
    var flightLongitude = parseFloat(article.dataset.flightlongitude);
    var centerLatitude = parseFloat((originLatitude + destinationLatitude) / 2);
    var centerLongitude = parseFloat((originLongitude + destinationLongitude) /2 );
    var flightOrigin = article.dataset.flightorigin;
    var flightDestination = article.dataset.flightdestination;
    var flightDepartureTime = article.dataset.flightdeparturetime;
    var flightArrivalTime = article.dataset.flightarrivaltime;

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 3,
        center: {lat: centerLatitude, lng: centerLongitude},
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        scrollwheel: false,
    });

    var flightPlaneCoordinates = [
        {lat: originLatitude, lng: originLongitude},
        {lat: destinationLatitude, lng: destinationLongitude},
    ];
    var flightPath = new google.maps.Polyline({
        path: flightPlaneCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
    });

    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Flug von ' + flightOrigin +' nach ' + flightDestination + '</h1>'+
        '<div id="bodyContent">'+
        '<ul>' +
        '<li>' +
        'Zeit Abflug: ' + new Date(flightDepartureTime*1000) +
        '</li>' +
        '</ul></div>'+
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var markerIcon = '/images/plane.png'
    var marker = new google.maps.Marker({
        position: {lat: flightLatitude, lng: flightLongitude},
        map: map,
        icon: markerIcon,
        title: 'Aktuelle Position'
    });

    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });

    flightPath.setMap(map);
}