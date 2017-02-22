@extends('layouts.app')
@section('content')
    <!-- Refresh Page -->
    <meta http-equiv="refresh" content="{{$refreshTime}}" >
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_KoeHUrv6K01WJ9ULPRWBQDXRQg_zGvg&callback=initMap"></script>
@foreach ($flights as $flight)
<div class="container flightcontainer">
    <div class="row flightListRow">
        <div class="col-md-12 col-sm-12 flightList">
            <div class="col-md-12 col-sm-12">
            <h1>{{$flight->getDestination()->getLocation()}}</h1>
                <div class="col-md-10 col-sm-10 flightlistblock">
                    <p>{{$cityDescriptions[$flight->getDestination()->getLocation()]}}</p>
                </div>
                <div class="col-md-2 col-sm-2 listViewImage">
                    <img class="img-thumbnail img-responsive" src="{{$cityPictures[$flight->getDestination()->getLocation()] or "http://img.erm-assets.com/r1-13-387-169/photos.idx/ES.idx/nopic_redesign.jpg"}}"/>
                </div>
            </div>
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 divider"></div>
            <div class="col-md-12">
                <div class="col-md-4 col-sm-6 weather"><img src="../images/icon/{{$weather[$flight->getDestination()->getLocation()] -> getIcon()}}.png" class="weatherIcon" width="40px" height="40px">{{$weather[$flight->getDestination()->getLocation()] -> getWeatherCondition()}}
                </div>
                    <div class="col-md-4 col-sm-6 weather"><img src="../images/thermometer.png" class="weatherIcon"> {{round($weather[$flight->getDestination()->getLocation()] -> getTemperature(),1)}} °C
                </div>
                <div class="col-md-4 col-sm-12 moreInfoButton"><a href="/flight/{{$flight -> getIdent()}}"><button type="button" class="btn btn-primary btn-block moreInfoButton"> Mehr Infos </button></a></div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection