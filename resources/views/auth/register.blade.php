@extends('layouts.app')
@section('content')

    <div class="container">
        <div id="header">
            <div id="logo">
                <a href="/home">
                    <img src="images/logo.png" alt="SkyTracker" width="628" height="200"/>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" id ="register" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Mail">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Passwort">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Passwort Bestätigen">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary submitbutton">
                                        Registrieren
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
