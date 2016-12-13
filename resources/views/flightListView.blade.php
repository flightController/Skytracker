<!DOCTYPE html>
<html lang="de">
<?php
include_once '../resources/views/includes/head.php';
include_once '../resources/views/includes/menu.php';
?>

<body>
<?php
foreach ($flights as $flight){
    echo <<<EOF
<div class="container flightcontainer">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 flightlist">
            <h1>{$flight->getDestination()->getLocation()}</h1>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 flightlistblock">
                    <p>test</p>
                    <div class="row flightweather">
                        <div class="hidelarge col-md-4 col-sm-0">
                            <img src=""/>
                        </div>
                        </div>
                        <div class="hidelarge col-md-4 col-sm-5 weather"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Sonnig
                        </div>
                        <div class="hidelarge col-md-4 col-sm-5 weather"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 21°
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12"><button type="button" class="btn btn-primary btn-block"> Mehr Infos </button>
                        </div>
                        <div class="col-lg-1 hidemediumsmall">
                        </div>
                        <div class="col-lg-3 hidemediumsmall weather"><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Sonnig
                        </div>
                        <div class="col-lg-3 hidemediumsmall weather"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 21°
                        </div>
                        <div class="col-lg-2 hidemediumsmall">
                        </div>
                    </div>
                    <div class="col-lg-3 hidemediumsmall">
                    <img src=""/>
                </div>
                </div>
            </div>
        </div>
    </div>
EOF;
}
?>
</body>
</html>