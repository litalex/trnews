<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans("base.siteName") }}</title>
    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/main.css') }}" rel="stylesheet">
</head>
<body>

<!-- Header -->
<div class="header">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-futbol-o"
                                                                 aria-hidden="true"></i> {{ trans("base.siteName") }}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            {{ Menu::generateMainMenu() }}
            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans("base.login") }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans("base.register") }}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('user_profile') }}"><i class="fa fa-user"
                                                                             aria-hidden="true"></i> {{ trans('base.profile') }}
                                    </a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-in"
                                                                       aria-hidden="true"></i> {{ trans('base.logout') }}
                                    </a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>

<!-- Wrapper -->
<div id="wrapper">@yield('content')</div>
<!-- Footer -->

<footer id="app-layout-footer">
    <div class="row text-center">
        <span>©</span>
        <span class="ng-binding">{{ date("Y") }}</span>
        <span>-</span>
        <span class="ng-binding">{{ trans("base.siteName") }}</span>
    </div>
    <!-- /.row -->
</footer>

<!-- JavaScripts -->
<script src="{{ elixir('js/app.js') }}"></script>

</body>
</html>
