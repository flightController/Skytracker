@if (Auth::user())

    <nav style="margin-bottom: 0" class="navbar navbar-default hidemobile">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img class="logo" style="margin-right: 10px; padding: 0; width: 100px; height: 33px;" src="../images/logo.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div  id="bs-example-navbar-collapse-1" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false" >
                            Eingeloggt als <b>{{ Auth::user()->name }} </b><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ url('/logout') }}">
                                    Logout <span style="margin-left: 5px;" class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>

                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <nav style="margin-bottom: 0" class="navbar navbar-default desktophide">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img class="logo" style="margin-right: 10px; padding: 0; width: 100px; height: 33px;" src="../images/logo.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div  id="bs-example-navbar-collapse-2" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false" >
                            <span style="margin-right: 5px" class="glyphicon glyphicon-user" aria-hidden="true"></span> Eingeloggt als <b>{{ Auth::user()->name }} </b><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ url('/logout') }}">
                                    <span style="margin-left: 25px; margin-right: 5px;" class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/settings"><span style="margin-right: 5px" class="glyphicon glyphicon-cog" aria-hidden="true"></span> Einstellungen
                        </a>

                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

@endif

