<div class="container menu-container">
    @if (Auth::user())
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarMobile">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="brand-left">
                <a class="navbar-brand" href="#"><img class="logo" style="margin-right: 10px; padding: 0; width: 100px; height: 33px;" src="..\images\logo.png" alt="Sky Tracker"></a>
            </div>

            <div id="navbar9" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Eingeloggt als <b>{{ Auth::user()->name }}</b><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>

                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
    @endif
</div>