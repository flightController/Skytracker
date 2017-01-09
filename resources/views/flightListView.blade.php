@extends('layouts.app')
@section('content')
    <head>
        <meta http-equiv="refresh" content="{{$refreshTime}}; URL=/">
    </head>

<body>
@foreach ($flights as $flight)
<div class="container flightcontainer">
    <div class="row flightlistrow">
        <div class="col-md-12 col-sm-12 flightlist">
            <h1>{{$flight->getDestination()->getLocation()}}</h1>
                <div class="col-md-9 col-sm-12 flightlistblock">
                    <p>{{$cityDescriptions[$flight->getDestination()->getLocation()]}}</p>
                    <div class="row flightweather">
                        <div class="hidelarge col-md-4 col-sm-0">
                            <img src="{{$cityPictures[$flight->getDestination()->getLocation()]}}"/>
                        </div>
                        </div>
                        <div class="hidelarge col-md-4 col-sm-5 weather"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Sonnig
                        </div>
                        <div class="hidelarge col-md-4 col-sm-5 weather"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 21°
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 moreinfobutton"><a href="/flight/{{$flight -> getIdent()}}"><button type="button" class="btn btn-primary btn-block"> Mehr Infos </button></a>
                        </div>
                        <div class="col-lg-1 hidemediumsmall">
                        </div>
                        <div class="col-lg-3 hidemediumsmall weather"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>{{$weather[$flight->getDestination()->getLocation()] -> getWeatherCondition()}}
                        </div>
                        <div class="col-lg-3 hidemediumsmall weather"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span>{{$weather[$flight->getDestination()->getLocation()] -> getTemperature()}}°
                        </div>
                        <div class="col-lg-2 hidemediumsmall">
                        </div>
                </div>
                <div class="col-lg-3 hidemediumsmall">
                    <img class="listViewImage" src="{{$cityPictures[$flight->getDestination()->getLocation()]}}"/>
                </div>
        </div>
    </div>
</div>
@endforeach
</body>
@endsection