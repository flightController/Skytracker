@extends('layouts.app')
@section('content')

    <?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $homeAirport = $_POST['homeAirport'];
        $password = $_POST['password'];
        $numberOfFlights = $_POST['numberOfFlightsSelect'];
        $refreshTime = $_POST['refreshTimeSelect'];
        $testMode = $_POST['testModeSelect'];

        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Bitte tragen Sie einen Namen ein';
        }

        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Bitte geben Sie eine gültige E-Mail Adresse an';
        }

        // Check if Home Airport has been entered and is valid
        if (!$_POST['homeAirport']) {
            $errHomeAirport = 'Tragen Sie einen gültigen Heimflughafen ein';
        }

        // If there are no errors, send the email
        if (!$errName && !$errEmail && !$errHomeAirport) {
            $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
        }
    }
    ?>

    <div class="container">
        <div class="row settingrow">
            <div class="col-md-12 settingcol">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#setting1">Benutzereinstellungen</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#setting2">Anzeigeeinstellungen</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="setting1" class="tab-pane fade in active">
                        <form class="form-horizontal" role="form" method="post" action="settings">
                            {{ csrf_field() }}
                        <h3>Benutzereinstellungen</h3>
                        <div class="col-md-12 firstlabel">
                            <label class='control-label'>Name</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <input type="name" class="form-control" id="inputName" placeholder="{{$userName}}">
                        </div>
                        <div class="col-md-12">
                            <label class='control-label'>E-Mail</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <input type="email" class="form-control" id="inputEmail" placeholder="{{$userEmail}}">
                        </div>
                        <div class="col-md-12">
                            <label class='control-label'>Heim Flughafen</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <input type="homeAirport" class="form-control" id="inputEmail" placeholder="{{$homeAirport}}">
                        </div>
                        <div class="col-md-12">
                            <label class='control-label'>Passwort ändern</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <input type="password" class="form-control" id="inputPassword" placeholder="********">
                        </div>
                        <div class="col-md-6"><br><br><br></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary submitbutton">Speichern</button>
                        </div>
                        </form>
                    </div>
                    <div id="setting2" class="tab-pane fade">
                        <form class="form-horizontal" role="form" method="post" action="settings">
                            {{ csrf_field() }}
                        <h3>Anzeigeeinstellungen</h3>
                        <div class="col-md-12 firstlabel">
                            <label class='control-label'>Anzahl angezeigter Flüge</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <select class="form-control" id="numberOfFlightsSelect">
                                <option hidden value="">{{$numberOfFlights}}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class='control-label'>Refreshtime in Sekunden</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <select class="form-control" id="refreshTimeSelect" >
                                <option hidden value="">{{$refreshTime}}</option>
                                <option value="1">1</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                                <option value="300">300</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class='control-label'>Arbeiten mit Testdaten</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <select class="form-control" id="testModeSelect">
                                <option hidden value=""><?php if ($testMode==1){echo "Ja";} elseif ($testMode==0) {echo "nein";}?></option>
                                <option value="1">Ja</option>
                                <option value="0">Nein</option>
                            </select>
                        </div>
                        <div class="col-md-6"><br><br><br></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary submitbutton">Speichern</button>
                        </div>
                            <div class="col-md-6"><?php $result=" "; echo $result; ?></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection