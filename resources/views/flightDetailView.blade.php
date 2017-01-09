@extends('layouts.app')
@section('content')

    <body>
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

                <div class="col-md-6 flightdetailmap">
                    <h2>Skytracker</h2>
                    <img src="../images/worldmap.png" class="img-responsive"/>
                </div>
                <div class="col-md-6 flightdetailweather">
                    <h2>Weather</h2>
                </div>

            <div class="col-md-12 flightdetailflight">
                <div class="col-md-6">
                    <h2>Flugdetails</h2>
                    <img src="{{$planePicture[0] or ""}}" class="img-responsive"/>
                </div>
                <div class="col-md-5 col-md-offset-1 aircraftdetail">
                    <h4>Flugnummer:</h4> {{$flight->getIdent()}}<br><br>
                    <h4>Fluggesellschaft: </h4> {{$flight->getAirline()}}<br><br>
                    <h4>Restliche Flugzeit: </h4> 3 Std 34 Min<br><br>
                    <h4>Flugzeugtyp: </h4> {{$flight->getAircraft()}}<br><br>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-12 col-sm-12'>
                    <div class="carousel slide media-carousel" id="media">
                        <div class="carousel-inner">
                            <div class="item  active">
                                <div class="row">
                                    @for($i = 0; $i < 4; $i++)
                                        <div class="col-lg-3 col-sm-12">
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
            </div>
        </div>
    </div>
    <script src="/js/lightbox.js"></script>
    </body>
@endsection