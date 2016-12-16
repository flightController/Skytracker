@extends('layouts.app')
@section('content')

    <div class="container">
        <div id="header">
            <div id="logo">
                <a href="/home"><img src="images/logo.png" alt="SkyTracker" width="628" height="200"/></a>
            </div>
        </div>


        <form class="form-horizontal" role="form" id="login" action="{{ url('/login') }}" method="post"
              accept-charset="UTF-8" name="loginform">
            <input type="hidden" name="submitted" id="submitted" value="1"/>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Mail">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">&nbsp;</div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Passwort">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="col-md-4">&nbsp;</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
        </form>
    </div>
@endsection
