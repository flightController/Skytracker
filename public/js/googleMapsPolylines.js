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

    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Flug von ' + flightOrigin +' nach ' + flightDestination + '</h1>'+
        '<div id="bodyContent">'+
        '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt' +
            'ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo' +
            'dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit' +
            'amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>'+
        '</div>'+
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var marker = new google.maps.Marker({
        position: {lat: flightLatitude, lng: flightLongitude},
        map: map,
        title: 'Aktuelle Position'
    });

    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });

    flightPath.setMap(map);
}