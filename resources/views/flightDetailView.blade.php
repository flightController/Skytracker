@extends('layouts.app')
@section('content')
    <div class="container flightcontainer">
        <div class="row flightdetail">
            <div class="col-lg-12 col-md-12 col-sm-12 flightDetailText">
                <h1>{{$flight->getDestination()->getLocation()}}</h1>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>{{$cityDescription}}</p>
                    </div>
                </div>
            </div>

                <div class="col-md-12 flightdetailmap">
                    <h2>Flugroute</h2>
                    <div class="col-md-12 googlemaps">
                        <article
                                id="coordinates"
                                data-originlatitude="{{$flight->getOrigin()->getGpsCoordinates()->getLatitude()}}"
                                data-originlongitude="{{$flight->getOrigin()->getGpsCoordinates()->getLongitude()}}"
                                data-destinationlatitude="{{$flight->getDestination()->getGpsCoordinates()->getLatitude()}}"
                                data-destinationlongitude="{{$flight->getDestination()->getGpsCoordinates()->getLongitude()}}"
                                data-flightlatitude="{{$flight->getGpsCoordinates()-> getLatitude()}}"
                                data-flightlongitude="{{$flight->getGpsCoordinates() -> getLongitude()}}"
                                data-flightorigin="{{$flight->getOrigin()->getLocation()}}"
                                data-flightdestination="{{$flight->getDestination()->getLocation()}}"
                                data-flightairline="{{$flight->getAirline()}}"
                                data-flightdeparturetime="{{$flight->getDepartureTime()}}"
                                data-flightarrivaltime="{{$flight->getArrivalTime()}}"
                                data-flightroute="{{json_encode($flight->getFlightRoute())}}"
                                >
                        </article>
                        <div id="map">
                            <script src="/js/googleMapsPolylines.js">
                                initMap();
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 flightdetailweather">
                    <h2>Wetterdaten</h2>
                    <table class="col-md-12 col-xs-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><img src="../images/icon/{{$weather -> getIcon()}}.png" class="weathericon" width="40px" height="40px"> {{$weather -> getWeatherCondition()}}</td>
                                <td><img src="../images/thermometer.png" class="weathericon"> {{round($weather -> getTemperature(), 1)}} °C</td>
                            </tr>
                            </tbody>
                        </table>
                    </table>
                </div>

            <div class="col-md-12 flightdetailflight">
                <h2>Flugdetails</h2>
                <div class="col-md-6 col-xs-12 aircraftdetail">
                    <div class="col-md-5 col-md-offset-1 col-xs-12 flightdetailairplane desktophide">
                        <img src="{{$planePicture[0] or ""}}" class="img-responsive airplanepicture"/>
                    </div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">Flugnummer</th>
                            <td>{{$flight->getIdent()}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Fluggesellschaft</th>
                            <td>{{$flight->getAirline()}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Flugzeugtyp</th>
                            <td>{{$flight->getAircraft()}}</td>
                        </tr>
                            <th scope="row">&nbsp;</th>
                            <td>&nbsp;</td>
                        <tr>
                        </tr>
                        <tr>
                            <th scope="row">Restliche Flugzeit</th>
                            <td>3 Std 34 Min</td>
                        </tr>
                        <tr>
                            <th scope="row">Erwartete Ankunftszeit</th>
                            <td>{{$flight->getArrivalTime()}}</td>
                        </tr>
                        <tr>
                            <th scope="row">&nbsp;</th>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <th scope="row">Aktuelle Höhe</th>
                            <td>{{$flight->getGpsCoordinates() -> getAltitude()}} M.ü.M.</td>
                        </tr>
                        <tr>
                            <th scope="row">Aktuelle Geschwindigkeit</th>
                            <td>{{$flight->getSpeed()}} km/h</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5 col-md-offset-1 col-xs-12 flightdetailairplane hidemobile">
                    <img src="{{$planePicture[0] or ""}}" class="img-responsive img-thumbnail airplanepicture"/>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 imagesliderrow'>
                    <h2>Eindrücke</h2>
                    <div class="carousel slide media-carousel hidemobile" id="media">
                        <div class="carousel-inner">
                            <div class="item  active">
                                <div class="row">
                                    @for($i = 0; $i < 4; $i++)
                                        <div class="col-lg-3 col-xs-12">
                                            <a class="thumbnail" href="{{$cityPictures[$i] or ""}}" data-lightbox="Destination Pictures"><img alt="" src="{{$cityPictures[$i] or ""}}"></a>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    @for($i = 4; $i < 8; $i++)
                                    <div class="col-lg-3">
                                        <a class="thumbnail" href="{{$cityPictures[$i] or ""}}" data-lightbox="Destination Pictures"><img alt="" src="{{$cityPictures[$i] or ""}}"></a>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                        <a data-slide="next" href="#media" class="right carousel-control">›</a>
                    </div>
                </div>
                <div class='col-sm-12 imagesliderrow'>
                    <div class="carousel slide media-carousel desktophide" id="media2">
                        <div class="carousel-inner">
                            <div class="item  active">
                                <div class="row">
                                        <div class="col-lg-3 col-xs-12">
                                            <a class="thumbnail" href="{{$cityPictures[0] or ""}}" data-lightbox="Destination Pictures"><img alt="" src="{{$cityPictures[0] or ""}}"></a>
                                        </div>
                                </div>
                            </div>
                            @for($a = 1; $a < 8; $a++)
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-3">
                                            <a class="thumbnail" href="{{$cityPictures[$a] or ""}}" data-lightbox="Destination Pictures"><img alt="" src="{{$cityPictures[$a] or ""}}"></a>
                                        </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <a data-slide="prev" href="#media2" class="left carousel-control">‹</a>
                        <a data-slide="next" href="#media2" class="right carousel-control">›</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection