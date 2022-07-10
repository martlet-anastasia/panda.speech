<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('/app/plugins/highlightjs/styles/darkula.css') }}">
    <link href="{{ asset('/app/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{ route('home') }}">
                    <b class="logo-abbr"><img src="{{ asset('logo.svg') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('logo.svg') }}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('logo.svg') }}" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{ Storage::url( Auth::user()->avatar_link )  }}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <p class="text-dark">{{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</p>
                                        </li>
                                        <li>
                                            <a href="{{ route('profile') }}" class="text-dark">
                                                <i class="fa fa-user"></i><span class="pl-2">Profile</span>
                                            </a>
                                        </li>
                                        <hr class="my-2">
                                        <li>
                                            <a href="{{ route('tariff') }}" class="text-dark">
                                                <i class="fa fa-paypal text-dark"></i><span class="pl-2">Tariff</span>
                                            </a>
                                        </li>
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn shadow-none border-0 bg-transparent text-dark c-pointer pl-0">
                                                    <i class="fa fa-arrow-circle-right text-dark"></i><span class="pl-3">Logout</span>
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">App</li>
                    <li>
                        <a href="{{ route('home') }}" aria-expanded="false">
                            <i class="fa fa-audio-description"></i><span class="nav-text">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('file.index') }}" aria-expanded="false">
                            <i class="fa fa-file-audio-o"></i><span class="nav-text">Audio Storage</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" aria-expanded="false">
                            <i class="fa fa-quora"></i><span class="nav-text">Translate Jobs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" aria-expanded="false">
                            <i class="fa fa-leaf"></i><span class="nav-text">Translate Library</span>
                        </a>
                    </li>
                    <li class="nav-label"></li>
                    <li class="nav-label">Settings</li>
                    <li>
                        <a href="{{ route('profile') }}" aria-expanded="false">
                            <i class="fa fa-user"></i><span class="nav-text">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tariff') }}" aria-expanded="false">
                            <i class="fa fa-paypal"></i><span class="nav-text">Tariff plan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0"></div>
            <!-- row -->
            @yield('content')
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('/app/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('/app/js/custom.min.js') }}"></script>
    <script src={{ asset('/app/js/settings.js') }}"></script>
    <script src={{ asset('/app/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('/app/plugins/highlightjs/highlight.pack.min.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>



    <script>
            (function($) {
            "use strict"

                new quixSettings({
                    version: "light", //2 options "light" and "dark"
                    layout: "vertical", //2 options, "vertical" and "horizontal"
                    navheaderBg: "color_1", //have 10 options, "color_1" to "color_10"
                    headerBg: "color_1", //have 10 options, "color_1" to "color_10"
                    sidebarStyle: "full", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
                    sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
                    sidebarPosition: "static", //have two options, "static" and "fixed"
                    headerPosition: "fixed", //have two options, "static" and "fixed"
                    containerLayout: "wide",  //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
                    direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
                });


            })(jQuery);
        </script>

</body>

</html>
