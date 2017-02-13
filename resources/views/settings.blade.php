@extends('layouts.app')
@section('content')

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
                                <input type="text" name="name" class="form-control" id="inputName"
                                       placeholder="{{$userName}}">
                            </div>
                            <div class="col-md-12">
                                <label class='control-label'>E-Mail</label>
                            </div>
                            <div class="col-md-6 settingoption">
                                <input type="email" name="email" class="form-control" id="inputEmail"
                                       placeholder="{{$userEmail}}">
                            </div>
                            <div class="col-md-12">
                                <label class='control-label'>Heim Flughafen</label>
                            </div>
                            <div class="col-md-6 settingoption">
                                <input type="text" name="home_airport" class="form-control" id="inputHomeAirport"
                                       placeholder="{{$homeAirport}}">
                            </div>
                            <div class="col-md-12">
                                <label class='control-label'>Passwort ändern</label>
                            </div>
                            <div class="col-md-6 settingoption">
                                <input type="password" name="password" class="form-control" id="inputPassword"
                                       placeholder="********">
                            </div>
                            <div class="col-md-12">
                                <label class='control-label'>Passwort bestätigen</label>
                            </div>
                            <div class="col-md-6 settingoption">
                                <input type="password" name="password_confirmation" class="form-control"
                                       id="password-confirm"
                                       placeholder="********">
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
                                <select name="number_of_flights" class="form-control" id="numberOfFlightsSelect">
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
                                <select name="refresh_time" class="form-control" id="refreshTimeSelect">
                                    <option hidden value="">{{$refreshTime}}</option>
                                    <option value="30">30 Sekunden</option>
                                    <option value="60">60 Sekunden</option>
                                    <option value="300">5 Minuten</option>
                                    <option value="600">10 Minuten</option>
                                    <option value="1800">30 Minuten</option>
                                    <option value="3600">60 Minuten</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class='control-label'>Arbeiten mit Testdaten</label>
                            </div>
                            <div class="col-md-6 settingoption">
                                <select name="test_mode" class="form-control" id="testModeSelect">
                                    <option hidden value="{{$testMode}}">@if ($testMode == 1)
                                            Ja
                                        @elseif($testMode == 0)
                                            Nein
                                        @endif
                                    </option>
                                    <option value="1">Ja</option>
                                    <option value="0">Nein</option>
                                </select>
                            </div>
                            <div class="col-md-6"><br><br><br></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary submitbutton">Speichern</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if (count($errors) > 0)
            <div class="alert alert-danger col-md-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($success))
            <div class="alert alert-success col-md-6">
                <ul>
                    <li>{{ $success }}</li>
                </ul>
            </div>
        @endif

@endsection