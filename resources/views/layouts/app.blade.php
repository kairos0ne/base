<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" id='csrf_token' content="{{ csrf_token() }}">
        <!-- Title of the page -->
        <title>Base</title>
        <!-- Fonts -->
        <link href="/css/fontawesome/font-awesome.css" rel='stylesheet' type='text/css'>
        <!-- Icons -->
       <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>  
        <!-- Styles -->
        <link href="/css/bootstrap/bootstrap.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link href="/css/all.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Lato';
                font-size: 16px;
            }

            .fa-btn {
                margin-right: 6px;
            } 
        </style>
    </head>
    <body>
        <div id="app">
            <div>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <!-- Collapsed Hamburger -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#app-navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Branding Image -->
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img id="logo" src="/svg/base_logo.svg" alt="">
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav">
                                  
                                <li><a v-link="{ path: '/foundation' }">Foundation</a></li>
                                @if(isset($clients))
                                <li><a v-link="{ path: '/dashboard' }">Dashboard</a></li>
                                @else
                                <li><a v-link="{ path: '/introduction' }">Getting Started</a></li>
                                <li><a v-link="{ path: '/workflow' }">Test Workflow</a></li>
                                @endif
                                <li><a v-link="{ path: '/documentation' }">Documentation</a></li>
                                
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                        <li><a href="{{ url('/user') }}"><i class="fa fa-btn fa-sign-out"></i>Account</a></li>
                                    </ul>
                                </li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </nav>
                
                <!-- Start Vue JS Router -->
                @if(isset($user))
                <router-view :username="{{ $user = auth()->user()->name }}"></router-view>
                @endif
            
                <!-- Start Laravel Content -->
                @yield('content')
            
                <!-- JavaScripts -->
                <script src="/js/jquery/jquery-2.2.2.js"></script>
                <script src="/js/bootstrap/bootstrap.js"></script>
                <script src="/js/bundle.js"></script>
                <script>$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});</script>
            </div>
        </div>
    </body>
</html>
