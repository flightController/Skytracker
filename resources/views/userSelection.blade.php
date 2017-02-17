@extends('layouts.app')
@section('content')


    <div class="col-md-12 settingcol">
        <h3>User Auswahl</h3>
        <div class="col-md-12 settingoption">
                <form class="form-horizontal" role="form" method="post" action="settings">
                {{ csrf_field() }}
                    <div class="col-md-12 firstlabel">
                        <label class='control-label'>Bitte entsprechenden User auswählen!</label>
                    </div>
                    <div class="col-md-6">
                        <select name="select_user" class="form-control" id="userSelect" data-live-search="true">
                        @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 firstlabel">
                        <label class='control-label'> </label>
                    </div>
                    <div class="place">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary submitbutton">Auswählen</button>
                    </div>
                </form>
        </div>
    </div>
@endsection