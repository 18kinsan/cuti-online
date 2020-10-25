<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{url('/')}}/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <script type="text/javascript" src="{{url('/')}}/js/jquery.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery-ui/jquery-ui.js"></script>
    <script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    @stack('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/js/jquery-ui/jquery-ui.css">
    <link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>


    <!-- Animation library for notifications   -->
    <link href="{{url('/')}}/assets/css/animate.min.css" rel="stylesheet" />

    <!-- Bootstrap core CSS     -->
    <link href="{{url('/')}}/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{url('/')}}/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{url('/')}}/assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{url('/')}}/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="azure">

            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/" class="simple-text">
                    <!-- <img src="{{ url('/') }}/assets/images/logopawt.png" alt="logo PA WATES" width="100px" style="margin-bottom: 10px" /><br> -->
                    CUTI ONLINE PA-WATES
                    </a>
                </div>

                <ul class="nav">
                    <li class="@yield('dashboard')">
                        <a href="{{ route('pegawai.dashboard') }}">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="@yield('profil')">
                        <a href="{{ route('pegawai.profil') }}">
                            <i class="pe-7s-user"></i>
                            <p>Profil Pegawai</p>
                        </a>
                    </li>
                    <li class="@yield('cuti')">
                        <a href="{{ route('cuti.tambah') }}">
                            <i class="pe-7s-note2"></i>
                            <p>Cuti</p>
                        </a>
                    </li>
                    <li class="@yield('izin')">
                        <a href="{{ route('izin') }}">
                            <i class="pe-7s-news-paper"></i>
                            <p>Izin</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}/#">@yield('title2')</a>
                    </div>
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{{route('logout')}}" onClick="event.preventDefault();
                                        document.getElementById('logout-form').submit()">
                                    <i class="fa fa-sign-out"></i>
                                    Keluar
                                </a>
                                <form id="logout-form" style="display: none" action="{{route('logout')}}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                             @yield('content')
                             @yield('content1')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('modal')
        @yield('modal3')

    <!--   Core JS Files   -->
    <script src="{{url('/')}}/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="{{url('/')}}/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="{{url('/')}}/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="{{url('/')}}/https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{url('/')}}/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="{{url('/')}}/assets/js/demo.js"></script>


    @stack('scripts')
</body>
</html>
