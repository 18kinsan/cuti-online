<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{url('/')}}/assets/images/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="csrf" content="{{ csrf_token() }}">

	<title>Sistem Cuti Online</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{url('/')}}/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{url('/')}}/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{url('/')}}/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{url('/')}}/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                    <!-- <img src="{{ url('/') }}/assets/images/logopawt.png" alt="logo PA WATES" width="100px" style="margin-bottom: 10px" /><br> -->
                    CUTI ONLINE PA-WATES
                </a>
            </div>

            <ul class="nav">
                <li class="@yield('dashboard')">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="@yield('datacuti')">
                    <a href="{{ route('cuti.data') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Data Cuti</p>
                    </a>
                </li>
                <li class="@yield('laporan')">
                    <a href="{{ route('laporan.data') }}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="@yield('master')">
                    <a href="{{ route('pegawai.data') }}">
                        <i class="pe-7s-science"></i>
                        <p>Data Master Pegawai</p>
                    </a>
                </li>
                <li class="@yield('setting')">
                    <a href="{{ route('pengaturan.data') }}">
                        <i class="pe-7s-tools"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						  @yield('title')
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
									<a href="{{route('logout')}}" onClick="event.preventDefault();
									document.getElementById('logout-form').submit()">
                                    <i class="fas fa-sign-out-alt"></i>
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


                        </div>
                </div>
            </div>
        </div>







    </div>
</div>
@yield('modal')
@yield('modal1')
@yield('modal2')
@yield('modal3')

</body>
    <!--   Core JS Files   -->
    <script src="{{url('/')}}/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="{{url('/')}}/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="{{url('/')}}/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="{{url('/')}}/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{url('/')}}/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="{{url('/')}}/assets/js/demo.js"></script>

    <!-- grafik -->
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

        {{-- Ajax --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    @stack('scripts')
    @stack('select2script')

</html>
