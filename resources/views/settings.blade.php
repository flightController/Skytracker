@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row settingrow">
            <div class="col-md-12 settingcol">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#setting1">Benutzereinstellungen</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#setting2">Standorteinstellungen</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#setting3">Anzeigeeinstellungen</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="setting1" class="tab-pane fade in active">
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
                            <label class='control-label'>Passwort ändern</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <input type="password" class="form-control" id="inputPassword" placeholder="********">
                        </div>
                        <div class="col-md-6"><br><br><br></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary submitbutton">Speichern</button>
                        </div>
                    </div>
                    <div id="setting2" class="tab-pane fade">
                        <h3>Standorteinstellungen</h3>

                    </div>
                    <div id="setting3" class="tab-pane fade">
                        <h3>Anzeigeeinstellungen</h3>
                        <div class="col-md-12 firstlabel">
                            <label class='control-label'>Anzahl angezeigter Flüge</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <select class="form-control" id="exampleSelect1">
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
                            <select class="form-control" id="exampleSelect1" >
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
                            <select class="form-control" id="exampleSelect1">
                                <option hidden value=""><?php if ($testMode==1){echo "Ja";} elseif ($testMode==0) {echo "nein";}?></option>
                                <option value="1">Ja</option>
                                <option value="0">Nein</option>
                            </select>
                        </div>
                        <div class="col-md-6"><br><br><br></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary submitbutton">Speichern</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection