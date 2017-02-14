@extends('layouts.app')
@section('content')

    <div class="col-md-12 settingcol">
        <h3>User Auswahl</h3>
        <div class="col-md-12 firstlabel">
            <label class='control-label'>Bitte entsprechenden User auswählen!</label>
        </div>
        <div class="col-md-6 settingoption">
            <select name="select_user" class="form-control" id="userSelect">
                <option hidden value=""></option>
                @foreach($users as $user)
                <option value="1">{{$user}}</option>
                @endforeach
            </select>
        </div>
    </div>



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