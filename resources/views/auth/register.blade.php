@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default loginpanel">
                    <div class="panel-body">
                        <div class="col-md-12 loginlogo">
                            <a href="/home">
                                <img src="images/logo.png"  class="img-responsive" alt="SkyTracker" width="628" height="200"/>
                            </a>
                        </div>
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
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary submitbutton">
                                        Registrieren
                                    </button>
                                </div>
                                <div class="col-md-12 registergroup">
                                    Zurück zum <a href="/login">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
