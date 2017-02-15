@extends('layouts.app')
@section('content')
    <div class="col-md-12 settingcol">
        <h3>User Auswahl</h3>
        <div class="col-md-12 firstlabel">
            <label class='control-label'>Bitte entsprechenden User auswählen!</label>
        </div>
        <div class="col-md-6 settingoption">
            <form class="form-horizontal" role="form" method="post" action="settings">
                {{ csrf_field() }}
                <select name="select_user" class="form-control" id="userSelect">
                    <option hidden value=""></option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary submitbutton">Auswählen</button>
                </div>
            </form>
        </div>
    </div>
@endsection