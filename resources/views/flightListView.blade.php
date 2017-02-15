@extends('layouts.app')
@section('content')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_KoeHUrv6K01WJ9ULPRWBQDXRQg_zGvg&callback=initMap"></script>
@foreach ($flights as $flight)
<div class="container flightcontainer">
    <div class="row flightlistrow">
        <div class="col-md-12 col-sm-12 flightlist">
            <div class="col-md-12 col-sm-12">
            <h1>{{$flight->getDestination()->getLocation()}}</h1>
                <div class="col-md-10 col-sm-10 flightlistblock">
                    <p>{{$cityDescriptions[$flight->getDestination()->getLocation()]}}</p>
                </div>
                <div class="col-md-2 col-sm-2 listViewImage">
                    <img class="img-thumbnail img-responsive" src="{{$cityPictures[$flight->getDestination()->getLocation()]}}"/>
                </div>
            </div>
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 divider"></div>
            <div class="col-md-12">
                <div class="col-md-4 col-sm-6 weather"><img src="../images/icon/{{$weather[$flight->getDestination()->getLocation()] -> getIcon()}}.png" class="weathericon" width="40px" height="40px">{{$weather[$flight->getDestination()->getLocation()] -> getWeatherCondition()}}
                </div>
                    <div class="col-md-4 col-sm-6 weather"><img src="../images/thermometer.png" class="weathericon"> {{round($weather[$flight->getDestination()->getLocation()] -> getTemperature(),1)}} °C
                </div>
                <div class="col-md-4 col-sm-12 moreinfobutton"><a href="/flight/{{$flight -> getIdent()}}"><button type="button" class="btn btn-primary btn-block moreinfobutton"> Mehr Infos </button></a></div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection