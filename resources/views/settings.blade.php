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
                            <input type="name" class="form-control" id="inputName" placeholder="Sven">
                        </div>
                        <div class="col-md-12">
                            <label class='control-label'>E-Mail</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <input type="email" class="form-control" id="inputEmail" placeholder="{{$userSettings->get}}">
                        </div>
                        <div class="col-md-12">
                            <label class='control-label'>Passwort ändern</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <input type="password" class="form-control" id="inputPassword" placeholder="********">
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
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class='control-label'>Refreshtime in Sekunden</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <select class="form-control" id="exampleSelect1">
                                <option>1</option>
                                <option>5</option>
                                <option>10</option>
                                <option>30</option>
                                <option>60</option>
                                <option>300</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class='control-label'>Arbeiten mit Testdaten</label>
                        </div>
                        <div class="col-md-6 settingoption">
                            <select class="form-control" id="exampleSelect1">
                                <option>Ja</option>
                                <option>Nein</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-md-offset-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection