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
        <div class="row-height">
            <div class="col-lg-6 flightdetailmap inside inside-full-height">
                <h2>Skytracker</h2>
                <img src="../images/worldmap.png"/>
            </div>
            <div class="col-lg-5 flightdetailweather inside inside-full-height">
                <h2>Weather</h2>
            </div>
        </div>
        <div class="col-lg-12 flightdetailflight">
            <h2>Flugdetails</h2>
            </br>
            <div class="col-lg-3">
                <h4>Flugnummer: </br></br>
                    Fluggesellschaft: </br></br>
                    Restliche Flugzeit: </br></br>
                    Flugzeugtyp: </br>
                </h4>
            </div>
            <div class="col-lg-3">
                <h4>{{$flight->getIdent()}}</br></br>
                    {{$flight->getAirline()}}</br></br>
                    3 Std 34 Min </br></br>
                    {{$flight->getAircraft()}} </br>
                </h4>
            </div>
            <div class="col-lg-6">
            </div>
        </div>
        <div class='row'>
            <div class='col-lg-12'>
                <div class="carousel slide media-carousel" id="media">
                    <div class="carousel-inner">
                        <div class="item  active">
                            <div class="row">
                                <div class="col-lg-3">
                                    <a class="thumbnail" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                </div>
                                <div class="col-lg-3">
                                    <a class="thumbnail" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                </div>
                                <div class="col-lg-3">
                                    <a class="thumbnail" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                </div>
                                <div class="col-lg-3">
                                    <a class="thumbnail" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <a class="thumbnail" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                </div>
                                <div class="col-lg-3">
                                    <a class="thumbnail" href="#"><img alt="" src="http://placehold.it/150x150"></a>
     s                           </div>
                                <div class="col-lg-3">
                                    <a class="thumbnail" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                </div>
                                <div class="col-lg-3">
                                    <a class="thumbnail" href="#"><img alt="" src="http://placehold.it/150x150"></a>
                                </div>
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

</body>
@endsection