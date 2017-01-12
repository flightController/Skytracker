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


    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 3,
        center: {lat: centerLatitude, lng: centerLongitude},
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        scrollwheel: false,
    });

    var flightPlanCoordinates = [
        {lat: originLatitude, lng: originLongitude},
        {lat: destinationLatitude, lng: destinationLongitude},
    ];
    var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
    });

    var marker = new google.maps.Marker({
        position: {lat: flightLatitude, lng: flightLongitude},
        map: map,
        title: 'Aktuelle Position'
    });

    flightPath.setMap(map);
}