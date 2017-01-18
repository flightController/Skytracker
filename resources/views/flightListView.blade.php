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
                        <div class="col-lg-3 col-md-4 col-sm-4 moreinfobutton"><a href="/flight/{{$flight -> getIdent()}}"><button type="button" class="btn btn-primary btn-block"> Mehr Infos </button></a>
                        </div>
                        <div class="col-lg-1 hidemediumsmall">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 weather"><img src="../images/sun.ico" width="20px" height="20px"> {{$weather[$flight->getDestination()->getLocation()] -> getWeatherCondition()}}
                        </div>
                        <div class="col-lg-3  col-md-4 col-sm-4 weather"><img src="../images/thermometer.ico" width="20px" height="20px"> {{$weather[$flight->getDestination()->getLocation()] -> getTemperature()}}°
                        </div>
                        <div class="col-lg-2 hidemediumsmall">
                        </div>
                </div>
                <div class="col-md-3 col-sm-12 listViewImage">
                    <img class="img-responsive" src="{{$cityPictures[$flight->getDestination()->getLocation()]}}"/>
                </div>
        </div>
    </div>
</div>
@endforeach
</body>
@endsection