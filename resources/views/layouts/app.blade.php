<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans("base.siteName") }}</title>
    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/theme.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/main.css') }}" rel="stylesheet">
</head>
<body id="home" class="homepage">

<!-- Header -->
<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-futbol-o"
                                                                 aria-hidden="true"></i> {{ trans("base.siteName") }}
                </a>
            </div>
            {{ Menu::generateMainMenu() }}
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
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
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->

<!-- Wrapper -->
<div id="wrapper">@yield('content')</div>

<!-- Footer -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                © {{ date("Y") }} {{ trans("base.siteName") }}. Разработка <a href="/" title="{{ trans("base.siteName") }}">{{ trans("base.siteName") }}</a>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</footer>

<!-- JavaScripts -->
<script src="{{ elixir('js/theme.js') }}"></script>
<script src="{{ elixir('js/app.js') }}"></script>

</body>
</html>
