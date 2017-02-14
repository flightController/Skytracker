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
                        <form class="form-horizontal" role="form" id="login" action="{{ url('/login') }}" method="post" accept-charset="UTF-8" name="loginform">
                            {{ csrf_field() }}
                            <input type="hidden" name="submitted" id="submitted" value="1"/>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Mail">
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
                                <div class="col-md-12 rememberme">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Login speichern
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary submitbutton">Login</button>
                                </div>
                                <div class="col-md-12 logingroup">
                                    Noch kein Benutzer?
                                    <a href="/register">
                                        Registrieren</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
